<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $su = User::create([
            'name' => 'Caesar Ali L',
            'username' => 'caesarali',
            'email' => 'caesaralilamondo@gmail.com',
            'password' => bcrypt('caesarali'),
            'email_verified_at' => now(),
        ]);
        $su->setRole('superadmin');
    }
}
