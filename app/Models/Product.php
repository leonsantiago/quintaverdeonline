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

    public function get_unit(){
        return ($this->attributes['unit'] == "unidad") ? "un." : "kg";

    }

    public function getCategory(){
        return $this->category->name;
    }

}
