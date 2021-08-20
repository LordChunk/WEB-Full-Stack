<?php

namespace Database\Seeders;

use App\Models\Discount;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Discount::create([
            'dish_id' => 1,
            'isStudentDiscount' => true,
            'discountPercentage' => '25',
            'startDate' => '2021-08-19',
            'endDate' => '2021-08-23',
        ]);

        Discount::create([
            'dish_id' => 2,
            'isStudentDiscount' => false,
            'discountPercentage' => '25',
            'startDate' => '2021-08-19',
            'endDate' => '2021-08-23',
        ]);
    }
}
