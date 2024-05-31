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
            // Determine whether to add artists to this concert (50% chance)
            if (rand(1, 2) !== 1) {
                $randomArtists = $artists->random(rand(0, 3));
    
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
