<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'table_number',
        'price'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dishes()
    {
        return $this->belongsToMany(Dish::class)
            ->withPivot('quantity', 'price');
    }

    public static function CreateNewOrder($user_id, $table_number, $dishes): Order
    {

        // Get multiply quantity of each dish and add it to the order
        $price = 0;
        foreach ($dishes as $dish) {
            $dishPrice = Dish::find($dish['id'])->price;
            $price += $dish['quantity'] * $dishPrice;
            $dish['price'] = $dishPrice;
        }

        $order = new Order([
            "price" => $price,
        ]);

        // Set user id or table number
        if(!is_null($user_id)) {
            $order->user_id = $user_id;
        } else {
            $order->table_number = $table_number;
        }
        $order->save();

        // Add dishes to the order
        foreach ($dishes as $dish) {
            $order->dishes()->attach(
                $dish['id'],
                [
                    'quantity' => $dish['quantity'],
                    'price' => $dish['price'],
                    'comment' => $dish['comment'] ?? null,
                ]
            );
        }

        return $order;
    }
}
