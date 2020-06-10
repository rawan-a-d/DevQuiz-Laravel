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
        // $this->call(UserSeeder::class);
        factory(App\User::class, 20)->create();
        factory(App\Message::class, 5)->create();
        factory(App\Question::class, 5)->create();
    }
}
