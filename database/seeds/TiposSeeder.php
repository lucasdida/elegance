<?php

use Illuminate\Database\Seeder;

class TiposSeeder extends Seeder
{

    public function run()
    {
        DB::table('tipos')->insert(['nome' => 'Acessório']);
        DB::table('tipos')->insert(['nome' => 'Calçado']);
        DB::table('tipos')->insert(['nome' => 'Roupa - Peça de Cima ']);
        DB::table('tipos')->insert(['nome' => 'Roupa - Peça de Baixo']);
    }
}
