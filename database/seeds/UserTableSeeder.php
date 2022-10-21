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
            'role' => 'admin',
            'sexo' => 'Varon',
            'last_name' => 'Campos',
            'confirmed' => '1'
        ]);
        User::create([
            'name' => 'Admin',
            'email' => 'admin@turney.com.ar',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
            'dni' => '',
            'address' => '',
            'phone' => '',
            'role' => 'admin',
            'sexo' => 'No definido',
            'last_name' => 'Turney',
            'confirmed' => '1'
        ]);
        User::create([
            'name' => 'paciente',
            'email' => 'paciente@yahoo.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
            'dni' => '',
            'address' => '',
            'phone' => '',
            'role' => 'patient',
            'last_name' => 'Apellido',
            'confirmed' => '1',
        ]);
        User::create([
            'name' => 'medico',
            'email' => 'medico@yahoo.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
            'dni' => '',
            'address' => '',
            'phone' => '',
            'role' => 'doctor',
            'last_name' => 'Apellido',
            'confirmed' => '1',
        ]);
        factory(User::class, 50)->states('patient')->create();

    }
}
