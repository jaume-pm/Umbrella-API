<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Artist;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Spanish Artists
        Artist::factory()->create(["name" => "Rosalía", "country" => "Spain", "bio" => "Aquí podréis ver todos mis conciertos con algunos descuentos! Venid a los conciertos de la Motomami!"]);
        Artist::factory()->create(["name" => "Enrique Iglesias", "country" => "Spain", "bio" => "Disfruta de la música y la pasión en cada uno de mis shows. ¡Únete a la fiesta!"]);
        Artist::factory()->create(["name" => "Pablo Alborán", "country" => "Spain", "bio" => "Ven a experimentar un viaje musical lleno de emociones. ¡Te espero en mi próximo concierto!"]);
        Artist::factory()->create(["name" => "Alejandro Sanz", "country" => "Spain", "bio" => "Únete a mí en un recorrido por mis mayores éxitos y nuevas melodías. ¡No te lo pierdas!"]);

        // Puerto Rican Artists
        Artist::factory()->create(["name" => "Bad Bunny", "country" => "Puerto Rico", "bio" => "El conejo malo en tu ciudad. Traigo el ritmo y la energía que te harán bailar toda la noche."]);
        Artist::factory()->create(["name" => "Daddy Yankee", "country" => "Puerto Rico", "bio" => "La leyenda del reggaetón en vivo. Prepárate para una noche inolvidable con el Big Boss."]);
        Artist::factory()->create(["name" => "Luis Fonsi", "country" => "Puerto Rico", "bio" => "Disfruta de una noche con las mejores baladas y ritmos latinos. ¡Vamos a cantar juntos!"]);

        // American Artists
        Artist::factory()->create(["name" => "Billie Eilish", "country" => "USA", "bio" => "Join me for an evening of raw emotions and deep beats. Let's vibe together!"]);
        Artist::factory()->create(["name" => "Kendrick Lamar", "country" => "USA", "bio" => "Experience the power of storytelling through rap. I'm bringing the heat to your city!"]);
        Artist::factory()->create(["name" => "Taylor Swift", "country" => "USA", "bio" => "Ready for a magical night of music and memories? Let's sing our hearts out together!"]);
        Artist::factory()->create(["name" => "Ariana Grande", "country" => "USA", "bio" => "Get ready for a night of high notes and hit songs. Can't wait to see you there!"]);
        Artist::factory()->create(["name" => "Post Malone", "country" => "USA", "bio" => "Bringing the vibes and hits to your doorstep. Let's rock this night together!"]);
    }
}
