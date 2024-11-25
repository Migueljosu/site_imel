<?php

namespace App\Http\Controllers;

use App\Models\Recurso;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;


class RecursoImportController extends Controller
{
    public function import(Request $request)
    {
        try {
            $request->validate([
                'file' => 'required|mimes:xlsx,csv'
            ]);

            $filePath = $request->file('file')->getRealPath();
            $errors = []; // Para armazenar erros de duplicidade

            (new FastExcel)->import($filePath, function ($line) use (&$errors) {
                // Verificar se já existe um recurso com a mesma combinação
                $exists = Recurso::where('id_disciplina', $line['id_disciplina'])
                    ->where('id_aluno', $line['id_aluno'])
                    ->where('ano_lectivo', $line['ano_lectivo'])
                    ->exists();

                if ($exists) {
                    $errors[] = "Recurso duplicado: Disciplina {$line['id_disciplina']}, Aluno {$line['id_aluno']}, Ano Lectivo {$line['ano_lectivo']}";
                    return null; // Ignorar este registro
                }

                return Recurso::create([
                    'id_disciplina' => $line['id_disciplina'],
                    'id_aluno'      => $line['id_aluno'],
                    'status'        => $line['status'],
                    'data_inscricao' => $line['data_inscricao'],
                    'ano_lectivo'   => $line['ano_lectivo'],
                ]);
            });

            if (!empty($errors)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Importação concluída com alguns erros.',
                    'errors' => $errors,
                ], 422);
            }

            return response()->json(['success' => true, 'message' => 'Recursos importados com sucesso!']);
        } catch (\Throwable $e) {
            return response()->json(['success' => false, 'message' => 'Erro ao importar o arquivo: ' . $e->getMessage()], 500);
        }
    }
}
