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
    return Inertia::render('Customer/Menu', ['dishTypes' => $this->groupByType()]);
  }

  public function groupByType()
  {
    $types = DishType::with('dishes', 'dishes.description')->get()
      ->map(function ($dishType) {
        $returnValue = new class{};

        $returnValue->name = $dishType->name;
        $returnValue->dishes = $dishType->dishes->map([$this, 'mapDish']);

        return $returnValue;
      })->toArray();

    // Sort by id of first dish in each type
    usort($types, function ($a, $b) {
      return $a->dishes[0]->id - $b->dishes[0]->id;
    });

    return $types;
  }

  public function mapDish($dish)
  {
    $returnValue = new class{};

    $returnValue->id = $dish->id;
    $returnValue->menu_indicator = $dish->menu_indicator;
    $returnValue->name = $dish->name;
    $returnValue->price = number_format($dish->price, 2, ',');

    if (isset($dish->description)) {
      $returnValue->description = $dish->description->description;
    } else {
      $returnValue->description = null;
    }

    if (isset($dish->type)) {
      $returnValue->dish_type = $dish->type->name;
    } else {
      $returnValue->dish_type = null;
    }

    return $returnValue;
  }
}
