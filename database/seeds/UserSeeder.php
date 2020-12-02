<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Pablo andres Romero Zurita',
            'email' =>'pabloanrozu@gmail.com',
            'password'=>bcrypt('laravel'),
        ]);
        factory(User::class,4)->create();
    }
}
