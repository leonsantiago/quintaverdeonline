<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'products';
    /**
     * @var mixed
     */
    protected $fillable = [
      'name',
      'category_id',
      'price',
      'unit',
      'image',
      'stock'
    ];


    const UNIT_TYPE = ['unidad', 'kg'];

    //'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    /**
     * @var mixed
     */

    public function category(){
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function orders(){
        return $this->belongsToMany(Order::class, 'order_details',
            'product_id','order_id')
            ->withTimestamps()
            ->withPivot(['quantity']);
    }

    public function promotions(){
        return $this->belongsToMany(Promotion::class, 'promotion_details',
            'product_id', 'promotion_id')
            ->withTimestamps()
            ->withPivot(['quantity']);
    }

    public function get_unit(){
        
        if ($this->attributes['unit'] == "unidad"){
            if ($this->pivot['quantity'] > 1){
                return 'unidades';
            }else{
                return 'unidad';
            }
        }else{
            return 'kg';
        }

    }

    public function getCategory(){
        return $this->category->name;
    }

}
