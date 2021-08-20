<?php

namespace App\Http\Controllers\Customer;

use App\Models\Discount;
use Inertia\Inertia;
use App\Models\DishType;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function home()
    {
        return Inertia::render('Customer/Home');
    }

    public function about()
    {
        return Inertia::render('Customer/About');
    }

    public function news()
    {
        return Inertia::render('Customer/News');
    }

    public function discount()
    {
        $discounts = Discount::where('isStudentDiscount', false)
            ->where('startDate','<=',date("Y-m-d"))
            ->where('endDate','>',date("Y-m-d"))
            ->with('dish')
            ->get();
        //dd($discounts);
        return Inertia::render('Customer/Discount',['discounts' => $discounts]);
    }

    public function studentDiscount()
    {
        return Inertia::render('Customer/StudentDiscount');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ShowMenu()
    {
        return Inertia::render('Customer/Menu', ['dishTypes' => DishType::GroupByType()]);
    }

    public function order()
    {
        return Inertia::render('Customer/Order');
    }

    // POST /customer/order
    public function orderConfirm(Request $request) {
        $this->validate($request, [
            'table_number' => 'required|integer',
            'dishes' => 'required|array',
        ]);

        $dishes = $request->input('dishes');
        $tableNumber = $request->input('table_number');

        $order = Order::CreateNewOrder(null, $tableNumber, $dishes);

        return Inertia::render('Customer/OrderSuccess', [
            'orderId' => $order->id,
            'tableNumber' => $order->table_number,
        ]);
    }

}
