<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $data = [
            ["nome" => "TREINADOR"],
            ["nome" => "PROFESSOR"],
        ];
        DB::table('types')->insert($data);

        // PERMISSÕES
        $data = [
            // Treinador
            ["regra" => "pokemon.index", "permissao" => 0, "type_id" => 1],
            ["regra" => "pokemon.create", "permissao" => 0, "type_id" => 1],
            ["regra" => "pokemon.edit", "permissao" => 0, "type_id" => 1],
            ["regra" => "pokemon.show", "permissao" => 0, "type_id" => 1],
            ["regra" => "pokemon.destroy", "permissao" => 0, "type_id" => 1],
            ["regra" => "tipo.index", "permissao" => 0, "type_id" => 1],
            ["regra" => "tipo.create", "permissao" => 0, "type_id" => 1],
            ["regra" => "tipo.edit", "permissao" => 0, "type_id" => 1],
            ["regra" => "tipo.show", "permissao" => 0, "type_id" => 1],
            ["regra" => "tipo.destroy", "permissao" => 0, "type_id" => 1],
            // Professor
            ["regra" => "pokemon.index", "permissao" => 1, "type_id" => 2],
            ["regra" => "pokemon.create", "permissao" => 1, "type_id" => 2],
            ["regra" => "pokemon.edit", "permissao" => 1, "type_id" => 2],
            ["regra" => "pokemon.show", "permissao" => 1, "type_id" => 2],
            ["regra" => "pokemon.destroy", "permissao" => 1, "type_id" => 2],
            ["regra" => "tipo.index", "permissao" => 1, "type_id" => 2],
            ["regra" => "tipo.create", "permissao" => 1, "type_id" => 2],
            ["regra" => "tipo.edit", "permissao" => 1, "type_id" => 2],
            ["regra" => "tipo.show", "permissao" => 1, "type_id" => 2],
            ["regra" => "tipo.destroy", "permissao" => 1, "type_id" => 2],
        ];
        DB::table('permissions')->insert($data);
    }
}
