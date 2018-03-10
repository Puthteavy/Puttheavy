<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
///php artisan db:seed --class=UserTableSeeder

    public function run()
    {
        User::create([
            'name'     =>  'Theavy',
            'email'    =>  'theavytep18@gmail.com',
            'password' =>   Hash::make('12345'),
        ]);
    }
}
