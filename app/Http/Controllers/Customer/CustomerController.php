<?php

namespace App\Http\Controllers\Customer;

use Inertia\Inertia;
use App\Models\DishType;
use App\Http\Controllers\Controller;


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
        return Inertia::render('Customer/Discount');
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
}
