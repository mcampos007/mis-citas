<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'Mario',
            'email' => 'mc@yahoo.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
            'dni' => '12345678',
            'address' => '',
            'phone' => '',
            'role' => 'admin'
        ]);
        factory(User::class, 50)->create();

    }
}
