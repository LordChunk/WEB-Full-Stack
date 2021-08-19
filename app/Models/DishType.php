<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DishType extends Model
{
    use HasFactory;

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
    ];

    public function dishes()
    {
        return $this->hasMany(Dish::class);
    }

    /**
     * @return DishType[]
     */
    public static function GroupByType(): iterable
    {
        $types = DishType::with('dishes', 'dishes.description')->get()
            ->map(function ($dishType) {
                $returnValue = new class {
                };

                $returnValue->name = $dishType->name;
                $returnValue->dishes = $dishType->dishes->map([__CLASS__, 'MapDish']);

                return $returnValue;
            })->toArray();

        // Sort by id of first dish in each type
        usort($types, function ($a, $b) {
            return $a->dishes[0]->id - $b->dishes[0]->id;
        });

        return $types;
    }

    // This is public because PHP seemingly makes it impossible to call private methods from other private methods inside mapper methods 🤷
    public static function MapDish($dish)
    {
        $returnValue = new class {
        };

        $returnValue->id = $dish->id;
        $returnValue->menu_indicator = $dish->menu_indicator;
        $returnValue->name = $dish->name;
        $returnValue->description = $dish->description?->description;
        $returnValue->price = number_format($dish->price, 2, '.');
        $returnValue->spiciness = $dish->spiciness;
        $returnValue->dish_type = $dish->type->name;

        // Add allergies
        if (isset($dish->allergies)) {
            $returnValue->allergies = $dish->allergies->map(function ($allergy) {
                return $allergy->name;
            });
        } else {
            $returnValue->allergies = [];
        }

        return $returnValue;
    }
}
