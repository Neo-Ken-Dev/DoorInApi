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
        factory(\App\User::class, 5)->create();

        factory(\App\Immeuble::class, 10)->create();

        $immeubles = App\Immeuble::all();

        // Populate the pivot table
        App\User::all()->each(function ($user) use ($immeubles) {
            $user->buildings()->attach(
                $immeubles->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
