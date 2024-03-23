<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeoInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ceo_infos')->insert([
            'name' => 'name',
            'title' => 'title',
            'description' => 'description',
            'vdo_link' => 'vdo_link',
        ]);
    }
}
