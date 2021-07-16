<?php

namespace App\Http\Controllers\Employee;

use Inertia\Inertia;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
  public function Index()
  {
    return Inertia::render('Employee/Dashboard');
  }
}
