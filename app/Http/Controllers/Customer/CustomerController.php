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
