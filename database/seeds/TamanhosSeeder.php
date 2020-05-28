<?php

use Illuminate\Database\Seeder;

class TamanhosSeeder extends Seeder
{

    public function run()
    {
        DB::table('tamanhos')->insert(['nome' => 'P']);
        DB::table('tamanhos')->insert(['nome' => 'M']);
        DB::table('tamanhos')->insert(['nome' => 'G']);
    }
}
