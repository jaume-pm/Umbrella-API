<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(10)->create();
        User::factory()->create([
            "email"=> "admin@admin.com",
            "password"=> bcrypt("12345678"),
            "balance" => "999999",
            "name"=> "admin",
            "role"=> "admin"
        ]);
        User::factory()->create([
            "email"=> "Jaume@PMUD.com",
            "password"=> bcrypt("12345678"),
            "balance" => "620",
            "name"=> "Jaume"
        ]);
    }
}
