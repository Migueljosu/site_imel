<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recurso extends Model
{
    use HasFactory;
    // Permitir atribuição em massa para os campos abaixo
    protected $fillable = [
        'id_disciplina',
        'id_aluno',
        'status',
        'data_inscricao',
        'ano_lectivo',
    ];
    public function aluno()
    {
        return $this->belongsTo(Aluno::class, 'id_aluno');
    }
}
