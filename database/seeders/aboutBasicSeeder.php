<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class aboutBasicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('about_basics')->insert([
            'title' => 'title',
            'we_are_content' => 'we_are_content',
            'we_do_content' => 'we_do_content',
            'missionContent' => 'missionContent',
            'vishionContent' => 'vishionContent',
        ]);
    }
}
