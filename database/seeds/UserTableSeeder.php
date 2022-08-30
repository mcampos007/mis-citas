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
            'dni' => '',
            'address' => '',
            'phone' => '',
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'paciente',
            'email' => 'paciente@yahoo.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
            'dni' => '',
            'address' => '',
            'phone' => '',
            'role' => 'patient'
        ]);
        User::create([
            'name' => 'medico',
            'email' => 'medico@yahoo.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
            'dni' => '',
            'address' => '',
            'phone' => '',
            'role' => 'doctor'
        ]);
        factory(User::class, 50)->create();

    }
}
