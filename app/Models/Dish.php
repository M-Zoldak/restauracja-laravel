<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{

    protected $table = 'dishes';
    protected $fillable = [
        'category_id',
        'name',
        'price',
        'ingredient',
        'description',
        'is_available',
    ];

    public function category()
    {
        return $this->belongsTo(DishCategory::class, 'category_id');
    }
}
