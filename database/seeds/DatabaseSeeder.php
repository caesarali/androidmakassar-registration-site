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
        $this->call(RolesSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(CitiesSeeder::class);
        $this->call(EventsSeeder::class);
        $this->call(SchedulesSeeder::class);
        $this->call(PromosSeeder::class);
    }
}
