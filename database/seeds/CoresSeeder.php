<?php

use Illuminate\Database\Seeder;

class CoresSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('cores')->insert(['nome' => 'Amarelo']);
        DB::table('cores')->insert(['nome' => 'Azul']);
        DB::table('cores')->insert(['nome' => 'Branco']);
        DB::table('cores')->insert(['nome' => 'Laranja']);
        DB::table('cores')->insert(['nome' => 'Marrom']);
        DB::table('cores')->insert(['nome' => 'Preto']);
        DB::table('cores')->insert(['nome' => 'Rosa']);
        DB::table('cores')->insert(['nome' => 'Roxo']);
        DB::table('cores')->insert(['nome' => 'Verde']);
        DB::table('cores')->insert(['nome' => 'Vermelho']);
    }
}
