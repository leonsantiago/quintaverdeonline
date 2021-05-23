<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'orders';

    protected $fillable = ['user_id','payment_type', 'total'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function products(){
        return $this->belongsToMany(Product::class, 'order_details',
            'order_id', 'product_id')->withTimestamps()->withPivot('quantity');
    }

    public function subtotal($id){
        $quantity = $this->products()->find($id)->pivot['quantity'];
        $price = $this->products()->find($id)->price;
        $subtotal = (float)($quantity * $price);

        return $subtotal;
    }
}
