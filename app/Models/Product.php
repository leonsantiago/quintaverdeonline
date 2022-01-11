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
// RELATIONS

  public function category(){
    return $this->hasOne(Category::class, 'id', 'category_id');
  }

  public function orders(){
    return $this->belongsToMany(Order::class, 'order_details',
      'product_id','order_id')
      ->withTimestamps()
      ->withPivot(['quantity']);
  }
    public function stock(){
      if ($this->active == 0){
        return 'Sin stock';
      }
    }
    public function promotions(){
      return $this->belongsToMany(Promotion::class, 'promotion_details',
        'product_id', 'promotion_id')
        ->withTimestamps()
        ->withPivot(['quantity']);
    }

// OTHER FUNCTIONS

    public function get_unit(){
      if ($this->unit == "unidad"){
        return 'un.';
      }else{
        return 'kg';
      }
    }

    public function image_url(){
      if ($this->image == null){
        return '/image/icons/default_image.png';
      }else{
        return '/image/' . $this->image;
      }

    }

    public function getCategory(){
        return $this->category->name;
    }

}
