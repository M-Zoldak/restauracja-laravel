<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{

    protected $table = 'tables';
    protected $fillable = [
        'table_number',
        'places_count',
        'is_occupied',
        'occupied_places_count',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'table_id');
    }
}
