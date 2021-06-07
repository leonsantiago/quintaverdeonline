<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $table = 'promotions';
    protected $fillable = ['name', 'description', 'image', 'active', 'price'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'promotion_details',
            'promotion_id', 'product_id')
            ->withTimestamps()
            ->withPivot('quantity');
    }
}
