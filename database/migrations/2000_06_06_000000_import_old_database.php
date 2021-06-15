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

        // Drop tables with unused data
        Schema::dropIfExists('gebruiker');

        Schema::rename('menu', 'old_menu');
        Schema::rename('new_menu', 'menu');



        DB::table('old_menu')->eachById(function ($dish) {
            $dishType = DishType::firstOrCreate(['name' => $dish->soortgerecht]);

            $dishDescription = null;
            if (strlen($dish->beschrijving) > 0) {
                $dishDescription = DishDescription::create(['description' => $dish->beschrijving]);
            }

            $newDish = new Dish;

            $newDish->menu_indicator = $dish->menunummer . $dish->menu_toevoeging;
            $newDish->name = $dish->naam;
            $newDish->price = $dish->price;

            $newDish->save();

            $newDish->type()->associate($dishType);
            $newDish->description()->associate($dishDescription);

            $newDish->save();
        });

        Schema::dropIfExists('old_menu');
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
