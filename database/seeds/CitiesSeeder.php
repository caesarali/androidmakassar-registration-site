<?php

use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            ['name' => 'Makasssar', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sidrap', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bone', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
