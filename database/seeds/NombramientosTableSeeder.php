<?php

use Illuminate\Database\Seeder;

class NombramientosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nombramientos')->insert([
            'nombramiento' => 'Anciano'
        ]);
        DB::table('nombramientos')->insert([
            'nombramiento' => 'Ministerial'
        ]);
        DB::table('nombramientos')->insert([
            'nombramiento' => 'Publicador'
        ]);
        DB::table('nombramientos')->insert([
            'nombramiento' => 'Precursor'
        ]);
    }
}
