<?php

namespace Database\Seeders;

use App\Models\Music;
use Illuminate\Database\Seeder;

class MusicSeeder extends Seeder
{
    public function run(): void
    {
        $songs = [
            // ==========================================
            // KATEGORI 1: MODERN ACOUSTIC (10 LAGU: ID 1 - 10)
            // ==========================================
            [
                'id' => 1,
                'title' => 'Solo Acoustic Serenade',
                'artist' => 'Jason Shaw (Audionautix)',
                'file_path' => 'https://upload.wikimedia.org/wikipedia/commons/transcoded/b/bf/Jason_Shaw_-_SOLO_ACOUSTIC_GUITAR.ogg/Jason_Shaw_-_SOLO_ACOUSTIC_GUITAR.ogg.mp3',
                'duration' => 225,
                'is_active' => true,
            ],
            [
                'id' => 2,
                'title' => 'Acoustic Meditation',
                'artist' => 'Jason Shaw (Fingerstyle Guitar)',
                'file_path' => 'https://upload.wikimedia.org/wikipedia/commons/transcoded/c/cb/Jason_Shaw_-_ACOUSTIC_MEDITATION.ogg/Jason_Shaw_-_ACOUSTIC_MEDITATION.ogg.mp3',
                'duration' => 210,
                'is_active' => true,
            ],
            [
                'id' => 3,
                'title' => 'Green Leaves Romance',
                'artist' => 'Jason Shaw (Acoustic Guitar)',
                'file_path' => 'https://upload.wikimedia.org/wikipedia/commons/transcoded/e/ec/Jason_Shaw_-_GREEN_LEAVES.ogg/Jason_Shaw_-_GREEN_LEAVES.ogg.mp3',
                'duration' => 152,
                'is_active' => true,
            ],
            [
                'id' => 4,
                'title' => 'Serenity Strings',
                'artist' => 'Jason Shaw (Soft Guitar)',
                'file_path' => 'https://upload.wikimedia.org/wikipedia/commons/transcoded/2/2d/Jason_Shaw_-_SERENITY.ogg/Jason_Shaw_-_SERENITY.ogg.mp3',
                'duration' => 120,
                'is_active' => true,
            ],
            [
                'id' => 5,
                'title' => 'Calmant (Peaceful Acoustic)',
                'artist' => 'Kevin MacLeod (Incompetech)',
                'file_path' => 'https://upload.wikimedia.org/wikipedia/commons/transcoded/3/3c/Kevin_MacLeod_-_Calmant.ogg/Kevin_MacLeod_-_Calmant.ogg.mp3',
                'duration' => 192,
                'is_active' => true,
            ],
            [
                'id' => 6,
                'title' => 'Windswept Harmony',
                'artist' => 'Kevin MacLeod (Acoustic Guitar & Flute)',
                'file_path' => 'https://upload.wikimedia.org/wikipedia/commons/transcoded/2/23/Kevin_MacLeod_-_Windswept.ogg/Kevin_MacLeod_-_Windswept.ogg.mp3',
                'duration' => 228,
                'is_active' => true,
            ],
            [
                'id' => 7,
                'title' => 'Bach Cello Suite No. 1 Prelude',
                'artist' => 'John Michel (Solo Cello)',
                'file_path' => 'https://upload.wikimedia.org/wikipedia/commons/transcoded/4/43/JOHN_MICHEL_CELLO-J_S_BACH_CELLO_SUITE_1_in_G_Prelude.ogg/JOHN_MICHEL_CELLO-J_S_BACH_CELLO_SUITE_1_in_G_Prelude.ogg.mp3',
                'duration' => 134,
                'is_active' => true,
            ],
            [
                'id' => 8,
                'title' => 'Bach Cello Suite No. 1 Minuets',
                'artist' => 'John Michel (Warm Cello)',
                'file_path' => 'https://upload.wikimedia.org/wikipedia/commons/transcoded/6/67/JOHN_MICHEL_CELLO-J_S_BACH_CELLO_SUITE_1_in_G_Minuets.ogg/JOHN_MICHEL_CELLO-J_S_BACH_CELLO_SUITE_1_in_G_Minuets.ogg.mp3',
                'duration' => 205,
                'is_active' => true,
            ],
            [
                'id' => 9,
                'title' => 'Plantation Sunset',
                'artist' => 'Jason Shaw (Folk Acoustic)',
                'file_path' => 'https://upload.wikimedia.org/wikipedia/commons/transcoded/d/d7/Jason_Shaw_-_PLANTATION.ogg/Jason_Shaw_-_PLANTATION.ogg.mp3',
                'duration' => 210,
                'is_active' => true,
            ],
            [
                'id' => 10,
                'title' => 'Acoustic Meadow Waltz',
                'artist' => 'SoundHelix (Acoustic Ensemble)',
                'file_path' => 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3',
                'duration' => 372,
                'is_active' => true,
            ],

            // ==========================================
            // KATEGORI 2: CLASSICAL & SACRED (10 LAGU: ID 11 - 20)
            // ==========================================
            [
                'id' => 11,
                'title' => 'Canon in D Major',
                'artist' => 'Johann Pachelbel (Classical Guitar)',
                'file_path' => 'https://upload.wikimedia.org/wikipedia/commons/transcoded/a/ae/Pachelbel_-_Canon_in_D_major%2C_P._37_%28Guitar%29.ogg/Pachelbel_-_Canon_in_D_major%2C_P._37_%28Guitar%29.ogg.mp3',
                'duration' => 180,
                'is_active' => true,
            ],
            [
                'id' => 12,
                'title' => 'Bridal Chorus (Here Comes the Bride)',
                'artist' => 'Richard Wagner (Wedding Orchestra)',
                'file_path' => 'https://upload.wikimedia.org/wikipedia/commons/a/a3/Wagner_Bridal_Chorus_%28ISRC_USUAN1100021%29.mp3',
                'duration' => 140,
                'is_active' => true,
            ],
            [
                'id' => 13,
                'title' => 'Wedding March',
                'artist' => 'Felix Mendelssohn (Symphony Orchestra)',
                'file_path' => 'https://upload.wikimedia.org/wikipedia/commons/transcoded/c/cb/A_Midsummer_Night%27s_Dream_Op._61_Wedding_March_%28Mendelssohn%29_European_Archive.ogg/A_Midsummer_Night%27s_Dream_Op._61_Wedding_March_%28Mendelssohn%29_European_Archive.ogg.mp3',
                'duration' => 285,
                'is_active' => true,
            ],
            [
                'id' => 14,
                'title' => 'Air on the G String',
                'artist' => 'Johann Sebastian Bach (Orchestral Suite)',
                'file_path' => 'https://upload.wikimedia.org/wikipedia/commons/transcoded/1/1e/Air_%28Bach%29.ogg/Air_%28Bach%29.ogg.mp3',
                'duration' => 202,
                'is_active' => true,
            ],
            [
                'id' => 15,
                'title' => "Jesu, Joy of Man's Desiring",
                'artist' => 'Johann Sebastian Bach (Organ & Strings)',
                'file_path' => 'https://upload.wikimedia.org/wikipedia/commons/5/51/Jesu%2C_Joy_of_Man%27s_Desiring_%28ISRC_USUAN1100189%29.mp3',
                'duration' => 195,
                'is_active' => true,
            ],
            [
                'id' => 16,
                'title' => 'Clair de Lune',
                'artist' => 'Claude Debussy (Suite Bergamasque Piano)',
                'file_path' => 'https://upload.wikimedia.org/wikipedia/commons/transcoded/b/be/Clair_de_lune_%28Claude_Debussy%29_Suite_bergamasque.ogg/Clair_de_lune_%28Claude_Debussy%29_Suite_bergamasque.ogg.mp3',
                'duration' => 304,
                'is_active' => true,
            ],
            [
                'id' => 17,
                'title' => 'Ave Maria',
                'artist' => 'Franz Schubert (Concert Heritage Band)',
                'file_path' => 'https://upload.wikimedia.org/wikipedia/commons/3/3a/Ave_Maria_in_Due_-_Concert_Band_-_United_States_Air_Force_Heritage_of_America_Band.mp3',
                'duration' => 270,
                'is_active' => true,
            ],
            [
                'id' => 18,
                'title' => 'Arrival of the Queen of Sheba',
                'artist' => 'George Frideric Handel (Baroque Strings)',
                'file_path' => 'https://upload.wikimedia.org/wikipedia/commons/transcoded/2/2d/Handel_-_Arrival_of_the_Queen_of_Sheba.ogg/Handel_-_Arrival_of_the_Queen_of_Sheba.ogg.mp3',
                'duration' => 190,
                'is_active' => true,
            ],
            [
                'id' => 19,
                'title' => 'The Swan (Le Cygne)',
                'artist' => 'Camille Saint-Saëns (John Michel Cello & Piano)',
                'file_path' => 'https://upload.wikimedia.org/wikipedia/commons/transcoded/d/db/JOHN_MICHEL_CELLO-SAINT_SAENS_CARNIVAL_OF_ANIMALS_THE_SWAN.ogg/JOHN_MICHEL_CELLO-SAINT_SAENS_CARNIVAL_OF_ANIMALS_THE_SWAN.ogg.mp3',
                'duration' => 175,
                'is_active' => true,
            ],
            [
                'id' => 20,
                'title' => 'Nocturne in C-sharp Minor',
                'artist' => 'Frédéric Chopin (Romantic Solo Piano)',
                'file_path' => 'https://upload.wikimedia.org/wikipedia/commons/transcoded/1/12/Chopin%2C_Nocturne_in_C-sharp_minor%2C_Op._Posth.ogg/Chopin%2C_Nocturne_in_C-sharp_minor%2C_Op._Posth.ogg.mp3',
                'duration' => 252,
                'is_active' => true,
            ],
        ];

        foreach ($songs as $song) {
            $song['tier'] = $song['id'] <= 5 ? 'basic' : ($song['id'] <= 10 ? 'basic_addon_1' : 'basic_addon_2');
            $song['order'] = $song['id'];
            Music::updateOrCreate(
                ['id' => $song['id']],
                $song
            );
        }
    }
}
