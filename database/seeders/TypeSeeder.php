<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // array di informazioni
        $types = [
            'Tipo 1',
            'Tipo 2',
            'Tipo 3',
            'Tipo 4',
            'Tipo 5'
        ];

        foreach($types as $tipo){
            $new_type = new Type();

            $new_type->nome = $tipo;

            $new_type->save();
        }
    }
}
