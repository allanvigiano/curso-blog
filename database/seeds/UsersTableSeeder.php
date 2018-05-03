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
            'name' => 'Administrador',
            'email' => 'admin@mail.com',
            'password' => bcrypt('secret'),
            'author' => 'Y',
            'admin'=> 'Y'
        ]);

        factory(App\User::class, 100)->create();
    }
}
