<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TipodocsTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(SpecialtiesTableSeeder::class);
        $this->call(Work_DaysTableSeeder::class);

    }
}
