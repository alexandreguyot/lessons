<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->insert([
            'firstname' => Str::random(10),
            'lastname' => Str::random(10),
            'email' => Str::random(10).'@example.com',
            'infos' => "",
            'created_at' => $timestamp,
            'updated_at' => $datetime,
        ]);
        DB::table('students')->insert([
            'firstname' => Str::random(10),
            'lastname' => Str::random(10),
            'email' => Str::random(10).'@example.com',
            'infos' => "",
        ]);
        DB::table('students')->insert([
            'firstname' => Str::random(10),
            'lastname' => Str::random(10),
            'email' => Str::random(10).'@example.com',
            'infos' => "",
        ]);
        DB::table('students')->insert([
            'firstname' => Str::random(10),
            'lastname' => Str::random(10),
            'email' => Str::random(10).'@example.com',
            'infos' => "",
        ]);
        DB::table('students')->insert([
            'firstname' => Str::random(10),
            'lastname' => Str::random(10),
            'email' => Str::random(10).'@example.com',
            'infos' => "",
        ]);
        DB::table('students')->insert([
            'firstname' => Str::random(10),
            'lastname' => Str::random(10),
            'email' => Str::random(10).'@example.com',
            'infos' => "",
        ]);
        DB::table('students')->insert([
            'firstname' => Str::random(10),
            'lastname' => Str::random(10),
            'email' => Str::random(10).'@example.com',
            'infos' => "",
        ]);
        DB::table('students')->insert([
            'firstname' => Str::random(10),
            'lastname' => Str::random(10),
            'email' => Str::random(10).'@example.com',
            'infos' => "",
        ]);
        DB::table('students')->insert([
            'firstname' => Str::random(10),
            'lastname' => Str::random(10),
            'email' => Str::random(10).'@example.com',
            'infos' => "",
        ]);
        DB::table('students')->insert([
            'firstname' => Str::random(10),
            'lastname' => Str::random(10),
            'email' => Str::random(10).'@example.com',
            'infos' => "",
        ]);
        DB::table('students')->insert([
            'firstname' => Str::random(10),
            'lastname' => Str::random(10),
            'email' => Str::random(10).'@example.com',
            'infos' => "",
        ]);

    }
}
