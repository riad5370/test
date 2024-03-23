<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivitieBasicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('basic_activities')->insert([
            'title' => 'Admin',
            'details' => 'Admin fdsfsdfs',
            'gallery_header' => 'Edit gallery_header',
            'vdo_header' => 'Edit vdo_header',
            'vdo_link' => 'Edit vdo_link',
        ]);
    }
}
