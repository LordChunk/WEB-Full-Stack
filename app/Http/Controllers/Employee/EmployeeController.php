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

    public function Sales()
    {
        return Inertia::render('Employee/Sales');
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
            $dishPrice = Dish::find($dish['id'])->price;
            $price += $dish['quantity'] * $dishPrice;
            $dish['price'] = $dishPrice;
        }

        $order = Order::create([
            "user_id" => $userId,
            "price" => $price,
        ]);

        // Add dishes to the order
        foreach ($dishes as $dish) {
            $order->dishes()->attach(
                $dish['id'],
                [
                    'quantity' => $dish['quantity'],
                    'price' => $dish['price'],
                ]
            );
        }

        return Inertia::render('Employee/OrderSuccess', [
            'orderId' => $order->id,
        ]);
    }
}
