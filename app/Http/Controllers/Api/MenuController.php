<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use App\Models\DishType;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dish::with('type', 'description')->get()->map([$this, 'mapDish']);

        return $dishes;
    }

    public function groupByType() {
        $types = DishType::with('dishes', 'dishes.description')->get()
            ->map(function($dishType) {
                $returnValue = new class{};
                $returnValue->type = $dishType->name;
                $returnValue->dishes = $dishType->dishes->map([$this, 'mapDish']);

                return $returnValue;
            });

        return $types;
    }

    public function mapDish($dish) {
        $returnValue = new class{};

        $returnValue->menu_indicator = $dish->menu_indicator;
        $returnValue->name = $dish->name;
        $returnValue->price = number_format($dish->price, 2, ',');

        if(isset($dish->description)) {
            $returnValue->description = $dish->description->description;
        } else {
            $returnValue->description = null;
        }

        if(isset($dish->type)) {
            $returnValue->type = $dish->type->name;
        } else {
            $returnValue->type = null;
        }

        return $returnValue;
    }
}
