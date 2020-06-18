<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create(
            array(
                'name' => 'Hasib Bin Siddique',
                'email' => 'siddique.hasib@gmail.com',
                'password' => \Illuminate\Support\Facades\Hash::make('12345678')
            )
        );
    }
}
