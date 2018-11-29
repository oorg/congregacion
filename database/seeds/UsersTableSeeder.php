<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'password' => bcrypt('hola'),
            'email' => 'admin@test.com',
            'remember_token' => str_random(10),
        ]);

        //factory(App\User::class, 5)->create()->each(function ($user) {
        //    $user->grupo()->save(factory(App\Grupo::class)->make());
        //});
        factory(App\User::class, 15)->create()->each(function ($user) {
            $grupo = $user->grupo()->save(factory(App\Grupo::class)->make());
            $grupo->integrantes()->save(factory(App\Integrante::class)->make());
            $grupo->integrantes()->save(factory(App\Integrante::class)->make());
            $grupo->integrantes()->save(factory(App\Integrante::class)->make());
            $grupo->integrantes()->save(factory(App\Integrante::class)->make());
            $grupo->integrantes()->save(factory(App\Integrante::class)->make());
            $grupo->integrantes()->save(factory(App\Integrante::class)->make());
        });

    }
}
