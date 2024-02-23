<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Alexandre Guyot',
                'email'          => 'a.pro.guyot@gmail.com',
                'password'       => bcrypt('aguyot'),
                'remember_token' => null,
                'locale'         => '',
            ],
        ];

        User::insert($users);
    }
}
