<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for($i = 0; $i < 10; $i++){

            $project = new Project();

            $project->titolo = $faker->sentence(5); // sentence con questa funzione genera casualmente una frase di circa 5 parole
            $project->contenuto = $faker->text(100); // text mi genera un testo casuale con circa 200 caratteri

            $project->save();
        }
    }
}
