<?php

use Illuminate\Database\Seeder;

class DepartamentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //seeder departamentos
        DB::table('departamentos')->insert([
            \App\Departamento::create(array('nombre' => 'Huila'))
        ]);
    }
}
