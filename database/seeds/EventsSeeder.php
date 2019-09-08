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
            'description' => '<p class="MsoNormal"><b>Kursus Android Basic:</b><o:p></o:p></p>

            <p class="MsoNormal">Kursus Android Basic merupakan Workshop untuk membuat
            aplikasi android mulai dari dasar.<o:p></o:p></p>

            <p class="MsoNormal">Peserta akan belajar membuat aplikasi android pertama mereka
            menggunakan Android Studio.<o:p></o:p></p>

            <p class="MsoNormal">&nbsp;<b style="font-size: 1rem;">Target Peserta:</b></p><p class="MsoNormal"><o:p></o:p></p>

            <p class="MsoNormal">Kursus ini bisa diikuti oleh siapa saja yang ingin memiliki
            kemampuan dasar&nbsp;<o:p></o:p></p>

            <p class="MsoNormal">dalam membuat aplikasi android.<span style="font-size: 1rem;">&nbsp;</span></p><p class="MsoNormal"><o:p></o:p></p>

            <p class="MsoNormal"><b>Persyaratan :</b><o:p></o:p></p>

            <p class="MsoNormal">Memiliki Laptop Windows/Linux/Mac dengan RAM minimal 4GB&nbsp;<span style="font-size: 1rem;">yang sudah terinstall Software Android Studio (</span><a href="https://developer.android.com/studio/" style="background-color: rgb(255, 255, 255); font-size: 1rem;">https://developer.android.com/studio/</a><span style="font-size: 1rem;">)</span></p><p class="MsoNormal"><o:p></o:p></p>

            <p class="MsoNormal">&nbsp;<b style="font-size: 1rem;">Jadwal Kursus:&nbsp;</b><span style="font-size: 1rem;">4 hari mulai jam 09:00 s/d 16:00 WITA Terdapat 2 pilihan
            kelas:</span></p><p><o:p></o:p></p>



            <ul><li>Kelas Weekend (Sabtu dan Minggu)<o:p></o:p></li><li>Kelas Weekday (Senin s/d Kamis)</li></ul><p class="MsoNormal"><b style="font-size: 1rem;">Fasilitas:</b><br></p><p class="MsoNormal"><o:p></o:p></p>









            <ul><li>Lunch<o:p></o:p></li><li>Snack<o:p></o:p></li><li>e-Modul<o:p></o:p></li><li>e-Certificate<o:p></o:p></li><li>Akses Internet</li></ul><p class="MsoNormal">
            <!--[endif]--><o:p></o:p></p>

            <p class="MsoNormal"><b style="font-size: 1rem;">Peluang Karir:</b><br></p><p class="MsoNormal"><o:p></o:p></p>



            <ul><li>Junior Android Developer<o:p></o:p></li><li>Junior Front End UI/UX</li></ul>',
            'price' => 3000000,
            'category_id' => $category->id,
            'city_id' => $city->id
        ]);
    }
}
