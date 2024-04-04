<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = [
            'Tecnologia 1',
            'Tecnologia 2',
            'Tecnologia 3',
            'Tecnologia 4',
            'Tecnologia 5'
        ];

        foreach($technologies as $element){
            $new_technologies = new Technology();
            $new_technologies->name = $element;
            $new_technologies->save();
        }
    }
}
