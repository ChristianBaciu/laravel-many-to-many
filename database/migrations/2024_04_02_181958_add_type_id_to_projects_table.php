<?php

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
        Schema::table('projects', function (Blueprint $table) {
            // 'type_id' vieni posizionato dopo 'id' con after
            // crea un colonna ('type_id')
            $table->unsignedBigInteger('type_id')->nullable()->after('id');
            // la relazione

            // onDelete permette di cancellare un record di type senza avere problemi
            // con il DB
            $table->foreign('type_id')->references('id')->on('types')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // questa riga cancella le relazioni
            $table->dropForeign('projects_type_id_foreign');
            // questa riga cancella la colonna
            $table->dropColumn('type_id');
        });
    }
};
