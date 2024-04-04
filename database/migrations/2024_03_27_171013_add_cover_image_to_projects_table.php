<?php

// php artisan make:migration add_cover_image_to_projects_table
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // up si occupa di creare una colonna
        Schema::table('projects', function (Blueprint $table) {

            // l'obbiettivo è quello di aggiungere una colonna chiamata 'cover_iamge'
            // nella tabella 'projects DB'
            $table->string('cover_image')->nullable()->after('contenuto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // down si occupa di distruggere una colonna
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('cover_image');
        });
    }
};
