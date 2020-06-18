<?php

use Illuminate\Database\Seeder;

class FilmGenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->delete();
        DB::table('genres')->insert(
            array (
                array (
                    'id' => 1,
                    'gen_title' => 'Action'
                ),
                array (
                    'id' => 2,
                    'gen_title' => 'Adventure'
                ),
                array (
                    'id' => 3,
                    'gen_title' => 'Animation'
                ),
                array (
                    'id' => 4,
                    'gen_title' => 'Biography'
                ),
                array (
                    'id' => 5,
                    'gen_title' => 'Comedy'
                ),
                array (
                    'id' => 6,
                    'gen_title' => 'Crime'
                ),
                array (
                    'id' => 7,
                    'gen_title' => 'Drama'
                ),
                array (
                    'id' => 8,
                    'gen_title' => 'Horror'
                ),
                array (
                    'id' => 9,
                    'gen_title' => 'Music'
                ),
                array (
                    'id' => 10,
                    'gen_title' => 'Mystery'
                ),
                array (
                    'id' => 11,
                    'gen_title' => 'Romance'
                ),
                array (
                    'id' => 12,
                    'gen_title' => 'Thriller'
                ),
                array (
                    'id' => 13,
                    'gen_title' => 'War'
                ),
            )
        );
    }
}
