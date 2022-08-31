<?php
use App\Specialty;

use Illuminate\Database\Seeder;

class SpecialtiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $specialties = [
            'Oftalmologia',
            'Peiatria',
            'Neurología'
        ];
        foreach ($specialties as $specialty) {
            // code...
            Specialty::create(
            [
                'name' => $specialty
            ]);
        }
        
    }
}
