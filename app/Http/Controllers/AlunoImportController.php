<?php

namespace App\Http\Controllers;

use Rap2hpoutre\FastExcel\FastExcel;
use App\Models\Aluno;
use App\Models\Curso;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AlunoImportController extends Controller
{
    // Método para exibir informações de um curso
    public function verCurso($id)
    {
        $curso = Curso::findOrFail($id); // Retorna 404 se o curso não existir
        // Busca os alunos associados ao curso
        $alunos = Aluno::where('id_curso', $id)->get();
        return view('admin.curso', compact('curso', 'alunos'));

    }

    public function import(Request $request)
    {
        // Validar o arquivo
        $request->validate([
            'file' => 'required|mimes:xlsx|max:2048',
        ]);

        try {
            // Usar FastExcel para importar o arquivo
            (new FastExcel)->import($request->file('file'), function ($row) {
                // Gerar o slug se não existir
                $slug = $this->generateUniqueSlug($row['nome'], $row['sobrenome'], $row['num_processo']);

                // Criar o aluno na tabela alunos
                Aluno::create([
                    'nome' => $row['nome'],
                    'sobrenome' => $row['sobrenome'],
                    'num_processo' => $row['num_processo'],
                    'classe' => $row['classe'] ?? null,
                    'id_curso' => $row['id_curso'],
                    'slug' => $slug,
                ]);
            });

            // Retornar resposta de sucesso como JSON
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            // Em caso de erro, retornar a mensagem de erro
            return response()->json(['success' => false, 'message' => 'Erro ao importar alunos: ' . $e->getMessage()]);
        }
    }
    // Função para gerar slug único
    private function generateUniqueSlug($nome, $sobrenome, $num_processo)
    {
        // Gerar o slug a partir dos campos nome, sobrenome e num_processo
        $slug = Str::slug($nome . ' ' . $sobrenome . ' ' . $num_processo);

        // Verificar se o slug já existe
        $count = Aluno::where('slug', $slug)->count();

        // Se já existir, adicionar um número para garantir que o slug seja único
        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }

        return $slug;
    }
}
