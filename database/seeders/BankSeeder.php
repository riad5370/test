<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bank_infos')->insert([
            'accountName' => 'accountName',
            'bankName' => 'bankName',
            'accountNumber' => 'accountNumber',
            'swiftCode' => 'swiftCode',
            'address' => 'address',
        ]);
    }
}
