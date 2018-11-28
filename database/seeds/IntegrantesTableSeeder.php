<?php

use Illuminate\Database\Seeder;

class IntegrantesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('integrantes')->insert([
            'nombre' => 'Juanito',
            'edad' => 10,
            'telefono' => '3344556677',
            'grupo_id' => 1,
        ]);
        DB::table('integrantes')->insert([
            'nombre' => 'Lucas',
            'edad' => 20,
            'telefono' => '3344556677',
            'grupo_id' => 1,
        ]);
        DB::table('integrantes')->insert([
            'nombre' => 'Pedro',
            'edad' => 10,
            'telefono' => '3344556677',
            'grupo_id' => 2,
        ]);
        DB::table('integrantes')->insert([
            'nombre' => 'Miguel',
            'edad' => 20,
            'telefono' => '3344556677',
            'grupo_id' => 2,
        ]);
    }
}
