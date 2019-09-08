<?php

use Illuminate\Database\Seeder;

class SchedulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schedules')->insert([
            ['name' => 'Kelas Weekend (Sabtu dan Minggu)', 'description' => '4 hari mulai jam 09:00 s/d 16:00 WITA', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kelas Weekday (Senin s/d Kamis)', 'description' => '4 hari mulai jam 09:00 s/d 16:00 WITA', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
