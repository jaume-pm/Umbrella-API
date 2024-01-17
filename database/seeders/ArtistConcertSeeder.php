<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Concert;
use App\Models\Artist;
use Illuminate\Support\Facades\DB;

class ArtistConcertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed the pivot table with user-concert relationships
        $concerts = Concert::all();
        $artists = Artist::all();
    
        foreach ($concerts as $concert) {
            // Determine whether to add artists to this concert (20% chance)
            if (rand(1, 5) !== 1) { // 1/5 chance (20%)
                $randomArtists = $artists->random(rand(0, 3)); // You can adjust the number of artists per concert
    
                foreach ($randomArtists as $artist) {
                    DB::table('artist_concert')->insert([
                        'concert_id' => $concert->id,
                        'artist_name' => $artist->name,
                    ]);
                }
            }
        }
    }
}    
