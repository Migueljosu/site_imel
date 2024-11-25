<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome', 'sobrenome', 'num_processo', 'classe', 'id_curso', 'slug'
    ];
    public function curso()
    {
        return $this->belongsTo(Curso::class, 'id_curso');
    }

    public function recursos()
    {
        return $this->hasMany(Recurso::class, 'id_aluno');
    }
}
