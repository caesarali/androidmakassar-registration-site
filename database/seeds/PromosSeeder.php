<?php

use Illuminate\Database\Seeder;

class PromosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('promo')->insert([
            'name' => 'Promo Launching Android Makassar',
            'event_id' => 1,
            'discount' => 50,
            'from_date' => '2019-09-01',
            'to_date' => '2019-09-15',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
