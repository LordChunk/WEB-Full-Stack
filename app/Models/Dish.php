<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dish extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'menu_indicator',
        'name',
        'price',
    ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(DishType::class, 'dish_type_id');
    }

    public function description(): BelongsTo
    {
        return $this->belongsTo(DishDescription::class, 'description_id');
    }

    public function orders() {
        return $this->belongsToMany(Order::class)
            ->withPivot(['quantity', 'price']);
    }
}
