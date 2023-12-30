<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\ConcertSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\ArtistSeeder;
use Database\Seeders\ConcertUserSeeder;
use Database\Seeders\ArtistConcertSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(ConcertSeeder::class);
        $this->call(ArtistSeeder::class);
        $this->call(ConcertUserSeeder::class);
        $this->call(ArtistConcertSeeder::class);
    }
}
