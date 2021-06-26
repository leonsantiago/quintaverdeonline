<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Pivot;

class OrderPromotion extends Pivot
{
    use HasFactory;
    protected $table = 'order_promotions';
    protected $primaryKey = 'id';

    protected $fillable = [
      'order_id',
      'promotion_id',
      'quantity'
    ];

    public function order(){
      return $this->belongsTo(Order::class);
    }

    public function promotion(){
      return $this->belongsTo(Promotion::class)
    }
}
