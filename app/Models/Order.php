<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $table = 'orders';
    protected $fillable = [
        'table_id',
        'order_status'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    public function table()
    {
        return $this->belongsTo(Table::class, 'table_id');
    }
}
