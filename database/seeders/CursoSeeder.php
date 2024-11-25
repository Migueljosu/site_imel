<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cursos')->insert([
            [
                'nome_curso' => 'Informática de Gestão',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome_curso' => 'Contabilidade e Gestão',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome_curso' => 'Administração Pública',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome_curso' => 'Finanças',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome_curso' => 'Estatística',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome_curso' => 'Contabilidade',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome_curso' => 'Gestão Empresarial',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome_curso' => 'Comunicação Social',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome_curso' => 'Comércio',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
