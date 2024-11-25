<?php

namespace App\Http\Controllers;

use App\Models\Comunicado;
use App\Models\Curso;
use App\Models\Disciplina;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $cursos = Curso::all();
        return view('admin.main', compact('cursos'));
    }
    public function getCursos()
    {
        // Busca todos os cursos
        $cursos = Curso::all();

        // Retorna os cursos como um JSON
        return response()->json($cursos);
    }
    public function cadastros()
    {
        // Buscar todos os cursos disponíveis
        $cursos = Curso::all();

        // Retornar a view de cadastro de disciplina com os cursos
        return view('admin.cadastros', compact('cursos'));
    }
    // Método para salvar o curso no banco de dados
    public function storeCurso(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'nome_curso' => 'required|string|max:255',
        ]);

        // Criar o novo curso
        $curso = new Curso();
        $curso->nome_curso = $request->nome_curso;
        $curso->save();

        // Retornar uma resposta JSON (com sucesso ou erro)
        return response()->json([
            'success' => true,
            'message' => 'Curso cadastrado com sucesso!',
        ]);
    }

    public function storeDisciplina(Request $request)
    {
        try {
            // Validação dos dados
            $request->validate([
                'nome_disciplina' => 'required|string|max:255|unique:disciplinas,nome_disciplina,NULL,id,id_curso,' . $request->id_curso,
                'id_curso' => 'required|exists:cursos,id',
            ]);

            // Criação da disciplina
            Disciplina::create([
                'nome_disciplina' => $request->nome_disciplina,
                'id_curso' => $request->id_curso,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Disciplina cadastrada com sucesso!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao cadastrar disciplina: ' . $e->getMessage(),
            ], 500);
        }
    }

    // AdminController.php

    public function storeUser(Request $request)
    {
        // Validação com captura de erro
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string',
            'nif' => 'required|string|max:20',
            'nivelAcesso' => 'required|string|in:admin,papelaria',
        ]);
    
        try {
            // Criação do usuário
            $user = User::create([
                'nome' => $validatedData['nome'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'nif' => $validatedData['nif'],
                'nivelAcesso' => $validatedData['nivelAcesso'],
            ]);
    
            return response()->json([
                'success' => true,
                'message' => 'Usuário cadastrado com sucesso!',
            ]);
        } catch (\Exception $e) {
            // Retorno de erro detalhado
            return response()->json([
                'success' => false,
                'message' => 'Erro ao cadastrar usuário.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    
    public function storeComunicado(Request $request)
    {
        // Validação dos dados do comunicado
        $validatedData = $request->validate([
            'titulo' => 'required|string|max:255',
            'conteudo' => 'required|string', 
        ]);

        try {
            // Criação do comunicado
            $comunicado = Comunicado::create([
                'titulo' => $validatedData['titulo'],
                'conteudo' => $validatedData['conteudo'],
                'data_emissao' => now(),
                'id_user' => auth()->id(), // ID do usuário logado
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Comunicado cadastrado com sucesso!',
                'data' => $comunicado,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao cadastrar comunicado.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
