<?php

namespace App\Http\Controllers\Employee;

use App\Models\Dish;
use App\Models\Role;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Order;
use App\Models\Allergy;
use App\Models\DishType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    public function Index()
    {
        return Inertia::render('Employee/Dashboard');
    }

    public function Menu()
    {
        return Inertia::render('Employee/Menu', [
            'dishTypes' => DishType::GroupByType(),
            'allAllergies' => Allergy::all(),
        ]);
    }

    public function Order()
    {
        return Inertia::render('Employee/Order');
    }

    // POST
    public function OrderConfirm(Request $request)
    {
        $userId = auth()->user()->getAuthIdentifier();
        $dishes = $request->input('dishes');

        $order = Order::CreateNewOrder($userId, null, $dishes);

        return Inertia::render('Employee/OrderSuccess', [
            'orderId' => $order->id,
        ]);
    }

    // GET
    public function Sales(Request $request)
    {
        $beginDate = $request->input('beginDate') ?? '1950/01/01';
        $endDate = $request->input('endDate') ?? date('Y-m-d');

        // Get sales within the specified date range
        $orderIds = Order::whereBetween('created_at', [$beginDate." 00:00:00", $endDate." 23:59:59"])->pluck('id')->toArray();

        // Get all ordered dishes and get the quantity of each dish per price tag
        if(!empty($orderIds)) {
            $bookKeepingDataset = DB::table('dish_order')
            ->whereIn('order_id', $orderIds)
            ->select(['dish_id', 'dishes.name', 'dish_order.price', DB::raw('SUM(quantity) as total_quantity')])
            ->groupBy(['dish_id', 'price'])
            ->join('dishes', 'dish_order.dish_id', '=', 'dishes.id')
            ->orderBy('dish_id')
            ->get();
        } else {
            $bookKeepingDataset = [];
        }

        return Inertia::render('Employee/Sales', [
            'serverBeginDate' => $beginDate,
            'serverEndDate' => $endDate,
            'sales' => $bookKeepingDataset,
        ]);
    }

    // POST
    public function updateAllergies(Request $request) {
        $dish = Dish::find($request->input('dishId'));
        $allergyNames = $request->input('allergies');

        $allergyIds = [];
        foreach($allergyNames as $allergyName) {
            $allergy = Allergy::where('name', $allergyName)->first();
            if($allergy) {
                $allergyIds[] = $allergy->id;
            }
        }

        $dish->allergies()->sync($allergyIds);

        // Bit of a hack to allow the use of Inertia.post in Vue without a redirect
        return redirect()->back();
    }

    // POST
    public function updateSpiciness(Request $request) {
        $dish = Dish::find($request->input('dishId'));
        $dish->spiciness = $request->input('spiciness');
        $dish->save();

        // Bit of a hack to allow the use of Inertia.post in Vue without a redirect
        return redirect()->back();
    }

    // GET
    public function users() {
        return Inertia::render('Employee/User', [
            'users' => User::with('role')->get(),
            'roles' => Role::all(),
        ]);
    }

    // POST
    public function updateUserRole(Request $request) {
        $user = User::find($request->input('userId'));
        $user->role_id = $request->input('roleId');
        $user->save();

        // Bit of a hack to allow the use of Inertia.post in Vue without a redirect
        return redirect()->back();
    }
}
