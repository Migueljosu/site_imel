<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Comunicado;
use App\Models\Curso;
use App\Models\Disciplina;
use App\Models\Recurso;
use Illuminate\Http\Request;
use Dompdf\Dompdf;

class WebController extends Controller
{
    public function show()
    {
        return view('comunicado');
    }
    public function sobre()
    {
        return view('sobre');
    }
    public function comunicados()
    {
        // Busca todos os comunicados
        $comunicados = Comunicado::all();

        // Retorna os comunicados em formato JSON
        return response()->json($comunicados);
    }
    public function getRecursos(Request $request)
    {
        $cursoId = $request->input('curso_id'); // Recebe o filtro pelo ID do curso, se fornecido

        $query = Recurso::with(['aluno', 'aluno.curso'])
        ->whereNull('status'); // Filtra apenas recursos onde o status é nulo

        if ($cursoId) {
            $query->whereHas('aluno.curso', function ($q) use ($cursoId) {
                $q->where('id', $cursoId);
            });
        }

        $recursos = $query->get()
            ->groupBy('id_aluno')
            ->map(function ($group) {
                $aluno = $group->first()->aluno;
                return [
                    'id_aluno' => $aluno->id,
                    'nome' => $aluno->nome . ' ' . $aluno->sobrenome,
                    'nome_curso' => $aluno->curso->nome_curso ?? 'N/A',
                    'num_processo' => $aluno->num_processo,
                    'classe' => $aluno->classe,
                    'ano_lectivo' => $group->first()->ano_lectivo,
                    'qtd_recursos' => $group->count(),
                ];
            })
            ->values(); // Transforma em array numérico para JSON.

        return response()->json($recursos);
    }
    public function index()
    {
        $cursos = Curso::all(); // Busca todos os cursos
        return view('recurso', compact('cursos'));
    }
    public function getDisciplinasRecurso($id, Request $request)
    {
        try {
            // Procurar aluno pelo slug
            $aluno = Aluno::where('slug', $request->slug)->find($id);

            if (!$aluno) {
                return response()->json(['message' => 'Slug inválido!'], 400);
            }

            // Obter as disciplinas de recurso para o aluno
            $disciplinas = Recurso::where('id_aluno', $id)->get(['id_disciplina'])
                ->map(function ($recurso) {
                    return Disciplina::find($recurso->id_disciplina);
                });

            if ($disciplinas->isEmpty()) {
                return response()->json(['message' => 'Nenhuma disciplina de recurso encontrada.'], 404);
            }

            return response()->json(['disciplinas' => $disciplinas]);
        } catch (\Exception $e) {
            // Em caso de erro, retornar uma mensagem com detalhes do erro
            return response()->json(['message' => 'Erro ao processar a requisição: ' . $e->getMessage()], 500);
        }
    }

    public function finalizarInscricao($id, Request $request)
    {
        try {
            // Tenta encontrar o aluno com base no slug
            $aluno = Aluno::where('slug', $request->slug)->find($id);

            if (!$aluno) {
                // Retorna erro caso o aluno não seja encontrado
                return response()->json(['message' => 'Slug inválido!'], 400);
            }

            // Atualiza o status dos recursos associados ao aluno
            Recurso::where('id_aluno', $id)->update(['status' => 'inscrito']);

            // Recupera todos os recursos associados ao aluno
            $recursos = Recurso::where('id_aluno', $id)->get();

            // Mapeia as disciplinas associadas aos recursos
            $disciplinas = $recursos->map(function ($recurso) {
                // Tenta encontrar a disciplina associada ao recurso
                $disciplina = Disciplina::find($recurso->id_disciplina);
                return $disciplina ? $disciplina->nome_disciplina : null; // Retorna o nome ou null se não encontrado
            });

            // Verifica se alguma disciplina foi encontrada como null
            if ($disciplinas->contains(null)) {
                // Retorna erro caso alguma disciplina não tenha sido encontrada
                return response()->json(['message' => 'Alguma disciplina não foi encontrada.'], 400);
            }

            // Gera o nome do arquivo PDF
            $pdfFilename = 'recibo_' . $aluno->id . '.pdf';

            // Gera o recibo em PDF usando o Dompdf
            $dompdf = new Dompdf();
            $dompdf->loadHtml(view('recibo', compact('aluno', 'recursos', 'disciplinas'))->render());
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();

            // Caminho onde o PDF será salvo dentro do diretório storage
            $storagePath = storage_path('app/public/recibos/' . $pdfFilename);

            // Cria o diretório de recibos se não existir
            if (!file_exists(dirname($storagePath))) {
                mkdir(dirname($storagePath), 0777, true);
            }

            // Salva o PDF no diretório de storage
            file_put_contents($storagePath, $dompdf->output());

            // Retorna o caminho do PDF gerado para o frontend
            $pdfUrl = asset('storage/recibos/' . $pdfFilename);

            return response()->json(['url' => $pdfUrl], 200);
        } catch (\Exception $e) {
            // Captura qualquer erro e retorna uma mensagem de erro
            return response()->json(['message' => 'Erro ao finalizar a inscrição: ' . $e->getMessage()], 500);
        }
    }
}
