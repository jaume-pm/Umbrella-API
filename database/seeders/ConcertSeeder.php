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
            'title' => 'Barcelona Nit Musical',
            'address' => 'Passeig Olímpic 5-7',
            'city' => 'Barcelona',
            'country' => 'Spain',
            'datetime' => now()->addDays(1),
            'is_outdoors' => true,
            'latitude' => 41.3638,
            'longitude' => 2.1527,
            'max_discount' => 50.00,
        ]);

        Concert::factory()->create([
            'title' => 'Bordeaux Rhythmic Rendezvous',
            'address' => 'Cours Jules Ladoumegue',
            'city' => 'Bordeaux',
            'country' => 'France',
            'datetime' => now()->addDays(2),
            'is_outdoors' => false,
            'latitude' => 44.8975,
            'longitude' => -0.5619,
            'max_discount' => 50.00,
        ]);

        Concert::factory()->create([
            'title' => 'Galați Groove Gala',
            'address' => 'Str Portului 2',
            'city' => 'Galați',
            'country' => 'Romania',
            'datetime' => now()->addDays(3),
            'is_outdoors' => false,
            'latitude' => 45.4263,
            'longitude' => 28.0365,
            'max_discount' => 50.00,
        ]);

        // USA Venues
        Concert::factory()->create([
            'title' => 'Boston Harmonic Hike',
            'address' => '100 Legends Way',
            'city' => 'Boston',
            'country' => 'United States',
            'datetime' => now()->addDays(4),
            'is_outdoors' => true,
            'latitude' => 42.3662,
            'longitude' => -71.0621,
            'max_discount' => 50.00,
        ]);

        Concert::factory()->create([
            'title' => 'Miami Melodic Madness',
            'address' => '601 Biscayne Blvd',
            'city' => 'Miami',
            'country' => 'United States',
            'datetime' => now()->addDays(5),
            'is_outdoors' => true,
            'latitude' => 25.7814,
            'longitude' => -80.1870,
            'max_discount' => 50.00,
        ]);

        // Locations likely to experience rain in early January
        Concert::factory()->create([
            'title' => 'Rio de Janeiro Rainforest Rhapsody',
            'address' => 'Rua Prof Eurico Rabelo Maracanã',
            'city' => 'Rio de Janeiro',
            'country' => 'Brazil',
            'datetime' => now()->addDays(1),
            'is_outdoors' => true,
            'latitude' => -22.9122,
            'longitude' => -43.2302,
            'max_discount' => 50.00,
        ]);

        Concert::factory()->create([
            'title' => 'Singapore Sonic Soiree',
            'address' => '9 Stadium Dr',
            'city' => 'Singapore',
            'country' => 'Singapore',
            'datetime' => now()->addDays(2),
            'is_outdoors' => true,
            'latitude' => 1.3025,
            'longitude' => 103.8754,
            'max_discount' => 50.00,
        ]);

        // Concert in Donald, VIC, Australia
        Concert::factory()->create([
            'title' => 'Down Under Downbeat Delight',
            'address' => '25-27 Blair St',
            'city' => 'Donald',
            'country' => 'Australia',
            'datetime' => now()->addDays(1),
            'is_outdoors' => true,
            'latitude' => -36.375,
            'longitude' => 143.0,
            'max_discount' => 50.00,
        ]);

        Concert::factory()->create([
            'title' => 'Jakarta Music Festival',
            'address' => 'Jl Pintu Satu Senayan',
            'city' => 'Jakarta',
            'country' => 'Indonesia',
            'datetime' => now()->addDays(3),
            'is_outdoors' => true,
            'latitude' => -6.2215,
            'longitude' => 106.8034,
            'max_discount' => 50.00,
        ]);
        // Manaus, Brazil - Outdoors
        Concert::factory()->create([
            'title' => 'Manaus Rainforest Rhythms',
            'address' => 'Avenida Eduardo Ribeiro',
            'city' => 'Manaus',
            'country' => 'Brazil',
            'datetime' => now()->addDays(1),
            'is_outdoors' => true,
            'latitude' => -3.1190,
            'longitude' => -60.0217,
            'max_discount' => 50.00,
        ]);

        // Hilo, Hawaii, USA - Outdoors
        Concert::factory()->create([
            'title' => 'Hilo Tropical Tunes',
            'address' => '1 Banyan Drive',
            'city' => 'Hilo',
            'country' => 'United States',
            'datetime' => now()->addDays(2),
            'is_outdoors' => true,
            'latitude' => 19.7297,
            'longitude' => -155.0900,
            'max_discount' => 50.00,
        ]);

        Concert::factory()->create([
            'title' => 'France Melodies',
            'address' => 'Jalan Tunku Abdul Rahman',
            'city' => 'Kuching',
            'country' => 'France',
            'datetime' => Carbon::create(2024, 1, 17, 18, 0, 0),
            'is_outdoors' => true,
            'latitude' => 43.5782263,
            'longitude' => -1.2736303,
            'max_discount' => 50.00,
        ]);

        Concert::factory()->create([
            'title' => 'A Coruña Open Air Concert',
            'address' => 'Sample Address',
            'city' => 'A Coruña',
            'country' => 'Spain',
            'datetime' => now()->setDate(2024, 1, 17)->setTime(18, 0), // Set the datetime to January 17, 2024, at 18:00
            'is_outdoors' => true,
            'latitude' => 43.3623,
            'longitude' => -8.4115,
            'max_discount' => 50.00,
        ]);
    }
}
