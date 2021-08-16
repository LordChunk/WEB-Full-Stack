<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewMenu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dish_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
        });


        Schema::create('dish_descriptions', function (Blueprint $table) {
            $table->id();
            $table->text('description');
        });

        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->string('menu_indicator');
            $table->string('name');
            $table->double('price');
            $table->foreignId('dish_type_id')->nullable()->constrained('dish_types');
            $table->foreignId('description_id')->nullable()->constrained('dish_descriptions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('new_menu');
        Schema::dropIfExists('dish_types');
        Schema::dropIfExists('dish_descriptions');
    }
}
