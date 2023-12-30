<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Concert;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ConcertUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Seed the pivot table with user-concert relationships
        $concerts = Concert::all();
        $users = User::all();

        foreach ($concerts as $concert) {
            $randomUsers = $users->random(rand(0, 10)); // You can adjust the number of users per concert

            foreach ($randomUsers as $user) {
                DB::table('concert_user')->insert([
                    'concert_id' => $concert->id,
                    'user_id' => $user->id,
                ]);
            }
        }
    }
}
