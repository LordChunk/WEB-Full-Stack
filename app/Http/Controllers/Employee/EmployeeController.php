<?php

namespace App\Http\Controllers\Employee;

use App\Models\Dish;
use Inertia\Inertia;
use App\Models\Order;
use App\Models\DishType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    public function Index()
    {
        return Inertia::render('Employee/Dashboard');
    }

    public function Menu()
    {
        return Inertia::render('Employee/Menu', ['dishTypes' => DishType::GroupByType()]);
    }

    public function Order()
    {
        return Inertia::render('Employee/Order');
    }

    // POST
    public function OrderConfirm(Request $request)
    {
        $userId = auth()->user()->getAuthIdentifier();
        $dishes = $request->all();

        // Get multiply quantity of each dish and add it to the order
        $price = 0;
        foreach ($dishes as $dish) {
            $price += $dish['quantity'] * Dish::find($dish['id'])->price;
        }

        dd($price);

        Order::create([
            "user_id" => $userId,
            "price" => $price,
            "dishes" => json_encode($dishes)
        ]);
    }
}
