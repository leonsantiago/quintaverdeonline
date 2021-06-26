<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $table = 'promotions';
    protected $fillable = ['name', 'description', 'image', 'active', 'price'];

// RELATIONS

    public function products()
    {
        return $this->belongsToMany(Product::class, 'promotion_details',
            'promotion_id', 'product_id')
            ->withTimestamps()
            ->withPivot('quantity');
    }

    public function orders(){
      return $this->belongsToMany(Order::class, 'order_details',
        'promotion_id', 'order_id')
        ->withTimestamps()
        ->withPivot('quantity');
    }
}
