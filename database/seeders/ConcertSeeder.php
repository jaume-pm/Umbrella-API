<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Concert;
use Carbon\Carbon;

class ConcertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // European Venues
        Concert::factory()->create([
            'address' => 'Passeig Olímpic 5-7',
            'city' => 'Barcelona',
            'country' => 'Spain',
            'datetime' => now()->addDays(1),
            'is_outdoors' => false,
            'latitude' => 41.3638,
            'longitude' => 2.1527,
        ]);

        Concert::factory()->create([
            'address' => 'Cours Jules Ladoumegue',
            'city' => 'Bordeaux',
            'country' => 'France',
            'datetime' => now()->addDays(2),
            'is_outdoors' => false,
            'latitude' => 44.8975,
            'longitude' => -0.5619,
        ]);

        Concert::factory()->create([
            'address' => 'Str Portului 2',
            'city' => 'Galați',
            'country' => 'Romania',
            'datetime' => now()->addDays(3),
            'is_outdoors' => false,
            'latitude' => 45.4263,
            'longitude' => 28.0365,
        ]);

        // USA Venues
        Concert::factory()->create([
            'address' => '100 Legends Way',
            'city' => 'Boston',
            'country' => 'United States',
            'datetime' => now()->addDays(4),
            'is_outdoors' => true,
            'latitude' => 42.3662,
            'longitude' => -71.0621,
        ]);

        Concert::factory()->create([
            'address' => '601 Biscayne Blvd',
            'city' => 'Miami',
            'country' => 'United States',
            'datetime' => now()->addDays(5),
            'is_outdoors' => true,
            'latitude' => 25.7814,
            'longitude' => -80.1870,
        ]);

        // Locations likely to experience rain in early January
        Concert::factory()->create([
            'address' => 'Rua Prof Eurico Rabelo Maracanã',
            'city' => 'Rio de Janeiro',
            'country' => 'Brazil',
            'datetime' => now()->addDays(1),
            'is_outdoors' => true,
            'latitude' => -22.9122,
            'longitude' => -43.2302,
        ]);


        Concert::factory()->create([
            'address' => '9 Stadium Dr',
            'city' => 'Singapore',
            'country' => 'Singapore',
            'datetime' => now()->addDays(2),
            'is_outdoors' => true,
            'latitude' => 1.3025,
            'longitude' => 103.8754,
        ]);

        // Concert in Donald, VIC, Australia
        Concert::factory()->create([
            'address' => '25-27 Blair St',
            'city' => 'Donald',
            'country' => 'Australia',
            'datetime' => Carbon::create(2024, 1, 2, 8, 0, 0, 'GMT'),
            'is_outdoors' => true,
            'latitude' => -36.375,
            'longitude' => 143.0,
        ]);

        Concert::factory()->create([
            'address' => 'Jl Pintu Satu Senayan',
            'city' => 'Jakarta',
            'country' => 'Indonesia',
            'datetime' => now()->addDays(3),
            'is_outdoors' => true,
            'latitude' => -6.2215,
            'longitude' => 106.8034,
        ]);
    }
}
