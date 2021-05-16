<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderDetail extends Pivot
{
    use HasFactory;
    protected $table = 'order_details';
    protected $primaryKey = 'id';
    protected $fillable = ['order_id', 'product_id'];

    public function products(){
        return $this->belongsTo(Product::class);
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }
}
