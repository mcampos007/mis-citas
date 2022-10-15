<?php

use Illuminate\Database\Seeder;
use App\Tipodoc;

class TipodocsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //
        $names = [
            'DNI',
            'CUIT',
            'CUIL',
            'PASAPORTE'
        ];
        foreach ($names as $name){
            Tipodoc::create([
            'name' => $name,
            
            ]);    
        }
    }
}
