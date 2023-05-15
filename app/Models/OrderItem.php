<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{

    protected $table = 'order_items';
    protected $fillable = [
        'order_id',
        'meal_id',
        'meal_amount',
    ];

    public function meal()
    {
        return $this->belongsTo(Dish::class, 'meal_id');
    }
}
