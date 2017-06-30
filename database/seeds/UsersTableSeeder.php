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
        factory(App\User::class)->create([
            'name' => 'Darko',
            'email' => 'd@gmail.com',
        ]);

        factory(App\User::class)->create([
            'name' => 'Gordana',
            'email' => 'g@gmail.com',
        ]);
    }
}
