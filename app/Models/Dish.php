<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dish extends Model
{
    use HasFactory;
    protected $table = 'menu';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'menu_indicator',
        'name',
        'price',
    ];

    public function Type(): BelongsTo
    {
        return $this->belongsTo(DishType::class, 'dish_type_id');
    }

    public function Description(): BelongsTo
    {
        return $this->belongsTo(DishDescription::class, 'description_id');
    }
}
