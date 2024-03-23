<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuccessBasic extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('success_basics')->insert([
            'title' => 'title',
            'details' => 'details',
        ]);
    }
}
