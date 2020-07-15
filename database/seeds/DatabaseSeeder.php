<?php
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
        // $this->call(UserSeeder::class);
        DB::table('id_types')->insert([
            'name' => "Cédula de Ciudadanía",
            'contraction' => "CC",
        ]);
        DB::table('id_types')->insert([
            'name' => "Tarjeta de Identidad",
            'contraction' => "TI",
        ]);
        DB::table('id_types')->insert([
            'name' => "Registro Civil",
            'contraction' => "RC",
        ]);
        DB::table('id_types')->insert([
            'name' => "Cédula de Extranjeria",
            'contraction' => "CE",
        ]);
        DB::table('id_types')->insert([
            'name' => "Adulto sin identificación",
            'contraction' => "AS",
        ]);
        DB::table('id_types')->insert([
            'name' => "Menor sin identificación",
            'contraction' => "MS",
        ]);
    }
}
