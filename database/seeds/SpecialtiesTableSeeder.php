<?php
use App\Specialty;
use App\User;

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
            'Alergología',
            'Análisis clínico',
            'Anatomía patológica',
            'Anestesiología',
            'Angiología',
            'Bioquímica clínica',
            'Cardiología',
            'Cirugía cardíaca',
            'Cirugía general',
            'Cirugía oral y maxilofacial',
            'Cirugía ortopédica',
            'Cirugía pediátrica',
            'Cirugía plástica',
            'Cirugía torácica',
            'Cirugía vascular',
            'Dermatología',
            'Endocrinología',
            'Estomatología',
            'Farmacología',
            'Farmacología Clínica',
            'Gastroenterología',
            'Genética',
            'Genética médica',
            'Geriatría',
            'Ginecología y obstetricia o tocología',
            'Hematología',
            'Hepatología',
            'Infectología',
            'Inmunología',
            'Medicina aeroespacial',
            'Medicina de emergencia',
            'Medicina del deporte',
            'Medicina del trabajo',
            'Medicina familiar y comunitaria',
            'Medicina física y rehabilitación',
            'Medicina forense',
            'Medicina intensiva',
            'Medicina interna',
            'Medicina nuclear',
            'Medicina preventiva y salud pública',
            'Microbiología y parasitología',
            'Nefrología',
            'Neumología',
            'Neurocirugía',
            'Neurofisiología clínica',
            'Neurología',
            'Nutriología',
            'Oftalmología',
            'Oncología médica',
            'Oncología radioterápica',
            'Otorrinolaringología',
            'Pediatría',
            'Psiquiatría',
            'Radiología',
            'Reumatología',
            'Toxicología',
            'Traumatología',
            'Urología'
        ];
        foreach ($specialties as $specialtyName) {
            // code...
            $specialty = Specialty::create(
            [
                'name' => $specialtyName
            ]);

            $specialty->users()->saveMany(
                factory(User::class,3)->states('doctor')->make()
            );
        }

        //Medico Test
        User::find(3)->specialties()->save($specialty);
        
    }
}
