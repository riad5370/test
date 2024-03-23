<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(ActivitieBasicSeeder::class);
        $this->call(GuestHouseBasicSeeder::class);
        $this->call(SuccessBasic::class);
        $this->call(SeoInfoSeeder::class);
        $this->call(BankSeeder::class);
        $this->call(ContactBasicSeeder::class);
        $this->call(aboutBasicSeeder::class);
        $this->call(ProductBasicSeeder::class);
        
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
