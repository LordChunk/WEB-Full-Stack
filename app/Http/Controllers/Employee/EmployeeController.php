<?php

namespace App\Http\Controllers\Employee;

use Inertia\Inertia;
use App\Models\DishType;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
  public function Index()
  {
    return Inertia::render('Employee/Dashboard');
  }

  public function Menu() {
    return Inertia::render('Employee/Menu', ['dishTypes' => DishType::GroupByType()]);
  }
}
