<?php

use App\Models\Dish;
use App\Models\DishDescription;
use App\Models\DishType;
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
        Schema::dropIfExists('sales');

        // Drop tables with unused data
        Schema::dropIfExists('gebruiker');

        // Migrate over old menu data
        DB::table('menu')->eachById(function ($oldDish) {
            // Add dish types to db
            $dishType = DishType::firstOrCreate(['name' => $oldDish->soortgerecht]);

            // Add descriptions
            $dishDescription = null;
            if (strlen($oldDish->beschrijving) > 0) {
                // Replace all <br> with spaces
                $oldDish->beschrijving = $this->sanitiseText($oldDish->beschrijving);
                $dishDescription = DishDescription::create(['description' => $oldDish->beschrijving]);
            }

            // Create actual dish entry
            $newDish = new Dish;

            $newDish->menu_indicator = $oldDish->menunummer . $oldDish->menu_toevoeging;

            // Replace all special HTML notations with their actual values
            $newDish->name = $this->sanitiseText($oldDish->naam);
            $newDish->price = $oldDish->price;

            // Link foreign elements to dish
            $newDish->type()->associate($dishType);
            $newDish->description()->associate($dishDescription);

            $newDish->save();
        });

        // Drop old menu data
        Schema::dropIfExists('menu');
    }

    private function sanitiseText(string $text) {
        $text = str_replace("&eacute;", "é", $text);
        $text = str_replace('<br>', ' ', $text);

        return $text;
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
