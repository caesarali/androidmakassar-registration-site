<?php

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = DB::table('categories')->first();
        $city = DB::table('cities')->first();
        Event::create([
            'name' => 'Kursus Android Basic Menggunakan Android Studio (Java)',
            'price' => 3000000,
            'category_id' => $category->id,
            'city_id' => $city->id
        ]);
    }
}
