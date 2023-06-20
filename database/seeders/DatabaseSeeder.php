<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'name' => 'Родион',
                'surname'=>'Свердлов',
                'department'=>'администраторы',
                'position'=>'администратор',
                'email'=>'admin@mail.ru',
                'password' => Hash::make('adminpassword'),
                'role'=>'admin'
            ]
        );
    }
}
