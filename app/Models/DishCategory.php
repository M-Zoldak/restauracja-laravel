<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DishCategory extends Model
{

    protected $table = 'dish_categories';
    protected $fillable = [
        'category_name',
    ];


    public function dishes()
    {
        return $this->hasMany(Dish::class, 'category_id');
    }
}
