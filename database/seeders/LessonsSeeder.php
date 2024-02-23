<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class LessonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('lessons')->insert([
            'title' => "Cours du lundi",
            'day' => 0,
            'date_start' => Carbon::now()->subMonth(6)->format('Y-m-d'),
            'date_end' => Carbon::now()->addMonth(4)->format('Y-m-d'),
            'hour' => "18:00:00",
        ]);
        DB::table('lessons')->insert([
            'title' =>  "Cours du mardi",
            'day' => 1,
            'date_start' => Carbon::now()->subMonth(6)->format('Y-m-d'),
            'date_end' => Carbon::now()->addMonth(4)->format('Y-m-d'),
            'hour' => "18:00:00",
        ]);
        DB::table('lessons')->insert([
            'title' =>  "Cours du mercredi",
            'day' => 2,
            'date_start' => Carbon::now()->subMonth(6)->format('Y-m-d'),
            'date_end' => Carbon::now()->addMonth(4)->format('Y-m-d'),
            'hour' => "18:00:00",
        ]);
        DB::table('lessons')->insert([
            'title' =>  "Cours du jeudi",
            'day' => 3,
            'date_start' => Carbon::now()->subMonth(6)->format('Y-m-d'),
            'date_end' => Carbon::now()->addMonth(4)->format('Y-m-d'),
            'hour' => "18:00:00",
        ]);
        DB::table('lessons')->insert([
            'title' =>  "Cours du vendredi",
            'day' => 4,
            'date_start' => Carbon::now()->subMonth(6)->format('Y-m-d'),
            'date_end' => Carbon::now()->addMonth(4)->format('Y-m-d'),
            'hour' => "18:00:00",
        ]);
    }
}
