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
            'discount'=> 12,
        ]);

        Concert::factory()->create([
            'address' => 'Cours Jules Ladoumegue',
            'city' => 'Bordeaux',
            'country' => 'France',
            'datetime' => now()->addDays(2),
            'is_outdoors' => false,
            'discount'=> 12,
        ]);

        Concert::factory()->create([
            'address' => 'Str Portului 2',
            'city' => 'Galați',
            'country' => 'Romania',
            'datetime' => now()->addDays(3),
            'is_outdoors' => false,
            'discount'=> 12,
        ]);

        // USA Venues
        Concert::factory()->create([
            'address' => '100 Legends Way',
            'city' => 'Boston',
            'country' => 'United States',
            'datetime' => now()->addDays(4),
            'is_outdoors' => true,
            'discount'=> 12,
        ]);

        Concert::factory()->create([
            'address' => '601 Biscayne Blvd',
            'city' => 'Miami',
            'country' => 'United States',
            'datetime' => now()->addDays(5),
            'is_outdoors' => true,
            'discount'=> 12,
        ]);

        // Locations likely to experience rain in early January
        Concert::factory()->create([
            'address' => 'Rua Prof Eurico Rabelo Maracanã',
            'city' => 'Rio de Janeiro',
            'country' => 'Brazil',
            'datetime' => now()->addDays(1),
            'is_outdoors' => true,
            'discount'=> 12,
        ]);

        Concert::factory()->create([
            'address' => 'Jl Pintu Satu Senayan',
            'city' => 'Jakarta',
            'country' => 'Indonesia',
            'datetime' => now()->addDays(3),
            'is_outdoors' => true,
            'discount'=> 12,
        ]);

        Concert::factory()->create([
            'address' => '9 Stadium Dr',
            'city' => 'Singapore',
            'country' => 'Singapore',
            'datetime' => now()->addDays(2),
            'is_outdoors' => true,
            'discount'=> 12,
        ]);

        // Concert in Donald, VIC, Australia
        Concert::factory()->create([
            'address' => '25-27 Blair St',
            'city' => 'Donald',
            'country' => 'Australia',
            'datetime' => Carbon::create(2024, 1, 2, 8, 0, 0, 'GMT'),
            'is_outdoors' => true,
            'discount'=> 12,
        ]);
    }
}
