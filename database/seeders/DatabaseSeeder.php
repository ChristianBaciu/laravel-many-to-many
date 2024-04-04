<?php
// il DatabaseSeeder è quel file che ci permette di passare, all'interno di un array, tutto
// l'elenco, in ordine, dei seeder che vogliamo lanciare al terminale con un solo commando
namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            // per lanciare tutti insieme i database
            ProjectSeeder::class,
            TypeSeeder::class,
            TechnologySeeder::class
        ]);
        // dopo aver compilato il file, possiamo lanciare dal terminale
        // php artisan migrate --seed

        // Indipendentemente da quanti seeder ci sono, tutti i seeder verranno
        // eseguiti per popolare il database
    }
}
