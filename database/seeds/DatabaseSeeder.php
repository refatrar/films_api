<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CoutnriesTableSeeder::class);
        $this->call(FilmGenresSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(FilmSeeder::class);
    }
}
