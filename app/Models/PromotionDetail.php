<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PromotionDetail extends Pivot
{
    use HasFactory;
    protected $table = 'promotion_details';
    protected $primaryKey = 'id';
    protected $fillable = ['promotion_id', 'product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }
}
