<?php

namespace Database\Seeders;

use App\Models\Dish;
use App\Models\Allergy;
use Illuminate\Database\Seeder;

class AllergySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Allergy::create([
            'name' => 'Gluten',
        ]);
        Allergy::create([
            'name' => 'Lactose',
        ]);
        Allergy::create([
            'name' => 'Varkensvlees',
        ]);

        // Temporary
        // Link allergies to dishes
        $allergies = Allergy::all();
        $dishes = Dish::all();
        foreach ($dishes as $dish) {
            $dish->allergies()->attach($allergies->random(rand(1, 3))->pluck('id'));
        }
    }
}
