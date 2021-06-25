<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderDetail extends Pivot
{
    use HasFactory;
    protected $table = 'order_details';
    protected $primaryKey = 'id';
    protected $fillable = [
      'order_id',
      'product_id',
      'promotion_id'
    ];

// RELATIONS

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function promotion(){
        return $this->belongsTo(Promotion::class);
    }

    // public function getOrderPromotions(orders){
      
    // }
}
