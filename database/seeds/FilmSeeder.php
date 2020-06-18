<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Model\Film::insert(
            array (
                array (
                    "id"=> 1,
                    "name"=> "The Shawshank Redemption",
                    "slug"=> "the_shawshank_redemption",
                    "description"=> "Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.",
                    "release"=> "14 October 1994",
                    "date"=> "1994-10-14",
                    "rating"=> 4,
                    "ticket"=> "Available",
                    "price"=> 500,
                    "country"=> 226,
                    "photo"=> "1592486482.jpg"
                ),
                array (
                    "id"=> 2,
                    "name"=> "The Dark Knight (2008)",
                    "slug"=> "the_dark_knight_2008",
                    "description"=> "When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice.",
                    "release"=> "18 July 2008",
                    "date"=> "2008-07-18",
                    "rating"=> 4,
                    "ticket"=> "Available",
                    "price"=> 500,
                    "country"=> 226,
                    "photo"=> "1592487060.jpg"
                ),
                array (
                    "id"=> 3,
                    "name"=> "The Matrix (1999)",
                    "slug"=> "the_matrix_1999",
                    "description"=> "A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.",
                    "release"=> "31 March 1999",
                    "date"=> "1999-03-31",
                    "rating"=> 4.2,
                    "ticket"=> "Available",
                    "price"=> 500,
                    "country"=> 226,
                    "photo"=> "1592487300.jpg"
                ),
                array (
                    "id"=> 4,
                    "name"=> "Interstellar (2014)",
                    "slug"=> "interstellar_2014",
                    "description"=> "A team of explorers travel through a wormhole in space in an attempt to ensure humanity's survival.",
                    "release"=> "7 November 2014",
                    "date"=> "2014-11-07",
                    "rating"=> 4,
                    "ticket"=> "Available",
                    "price"=> 500,
                    "country"=> 226,
                    "photo"=> "1592487621.jpg"
                ),
                array (
                    "id"=> 5,
                    "name"=> "Parasite (2019)",
                    "slug"=> "parasite_2019",
                    "description"=> "Greed and class discrimination threaten the newly formed symbiotic relationship between the wealthy Park family and the destitute Kim clan.",
                    "release"=> "7 November 2014",
                    "date"=> "2014-11-07",
                    "rating"=> 4,
                    "ticket"=> "Available",
                    "price"=> 500,
                    "country"=> 226,
                    "photo"=> "1592490322.jpg"
                ),
                array (
                    "id"=> 6,
                    "name"=> "Knives Out (2019)",
                    "slug"=> "knives_out_2019",
                    "description"=> "A detective investigates the death of a patriarch of an eccentric, combative family.",
                    "release"=> " 27 November 2019",
                    "date"=> "2019-11-27",
                    "rating"=> 3.7,
                    "ticket"=> "Available",
                    "price"=> 500,
                    "country"=> 226,
                    "photo"=> "1592490322.jpg"
                ),
            )
        );

        \App\Model\FilmGenre::truncate();
        \App\Model\FilmGenre::insert(
            array(
                array(
                    'film_id' => 1,
                    'genre_id' => 1,
                ),
                array(
                    'film_id' => 2,
                    'genre_id' => 1,
                ),
                array(
                    'film_id' => 2,
                    'genre_id' => 2,
                ),
                array(
                    'film_id' => 3,
                    'genre_id' => 3,
                ),
                array(
                    'film_id' => 3,
                    'genre_id' => 1,
                ),
                array(
                    'film_id' => 3,
                    'genre_id' => 2,
                ),
                array(
                    'film_id' => 4,
                    'genre_id' => 4,
                ),
                array(
                    'film_id' => 5,
                    'genre_id' => 1,
                ),
                array(
                    'film_id' => 5,
                    'genre_id' => 2,
                ),
                array(
                    'film_id' => 5,
                    'genre_id' => 4,
                ),
                array(
                    'film_id' => 6,
                    'genre_id' => 2,
                ),
                array(
                    'film_id' => 6,
                    'genre_id' => 4,
                ),
            )
        );

        $faker = Faker::create();

        \App\Model\Comment::truncate();
        \App\Model\Comment::insert(
            array(
                array(
                    'film_id' => 1,
                    'user_id' => 1,
                    'comment' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true)
                ),
                array(
                    'film_id' => 2,
                    'user_id' => 1,
                    'comment' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true)
                ),
                array(
                    'film_id' => 3,
                    'user_id' => 1,
                    'comment' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true)
                ),
                array(
                    'film_id' => 4,
                    'user_id' => 1,
                    'comment' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true)
                ),
                array(
                    'film_id' => 5,
                    'user_id' => 1,
                    'comment' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true)
                ),
                array(
                    'film_id' => 6,
                    'user_id' => 1,
                    'comment' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true)
                ),
            )
        );
    }
}
