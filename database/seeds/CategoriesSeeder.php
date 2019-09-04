<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['code' => 'AND', 'name' => 'Android Fundamental', 'created_at' => now(), 'updated_at' => now()],
            ['code' => 'FLT', 'name' => 'Flutter', 'created_at' => now(), 'updated_at' => now()]
        ]);
    }
}
