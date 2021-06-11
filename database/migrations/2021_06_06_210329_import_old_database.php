<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ImportOldDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Import old database
        DB::unprepared( file_get_contents( __DIR__. "/initial.sql" ) );

        // Drop unused tables
        Schema::dropIfExists('specialiteiten');
        Schema::dropIfExists('rijst_enzo');
        Schema::dropIfExists('menu_pdf');

        // Drop tables with unused data
        Schema::dropIfExists('gebruiker');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
