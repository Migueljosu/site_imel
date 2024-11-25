<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comunicado extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'conteudo',
        'data_emissao',
        'id_user',
    ];

    // Relacionamento com o modelo User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
