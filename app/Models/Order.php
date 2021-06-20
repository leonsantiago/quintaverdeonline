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

// RELATIONS

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function products(){
        return $this->belongsToMany(Product::class, 'order_details',
          'order_id', 'product_id')
          ->withTimestamps()
          ->withPivot('quantity');
    }

    public function promotions(){
      return $this->belongsToMany(Promotion::class, 'order_details',
        'order_id', 'promotion_id')
        ->withTimestamps()
        ->withPivot('quantity');
    }


//OTHER FUNCTIONS

    public function searchByDate($from, $to){
        Order::whereBetween('created_at', [$from, $to])->get();
    }

    public function get_date(){
        return date('d/m/Y h:i A', strtotime($this->created_at));
    }

    public function productSubtotal($id){
        $quantity = $this->products()->find($id)->pivot['quantity'];
        $price = $this->products()->find($id)->price;
        $subtotal = (float)($quantity * $price);

        return $subtotal;
    }

    public function promotionSubtotal($id){
      $quantity = $this->promotions()->find($id)->pivot['quantity'];
      $price = $this->promotions()->find($id)->price;
      $subtotal = (float)($quantity * $price);
      return $subtotal;
    }

    public function deliverDate(){
        $deliverDate = date('l');
        $hour = date('G');
        switch ($deliverDate) {
          case 'Sunday':
            return 'Su pedido será entregado el Lunes.';
            break;
          case 'Monday':
            return ($hour < 4) ? 'Su pedido será entregado mañana.' : 'Su pedido será entregado el Miércoles.';
            break;
          case 'Tuesday':
            return 'Su pedido será entregado el Miércoles.';
            break;
          case 'Wednesday':
            return ($hour < 4) ? 'Su pedido será entregado mañana.' : 'Su pedido será entregado el Viernes.';
            break;
          case 'Thursday':
            return 'Su pedido será entregado el Viernes.';
            break;
          case 'Friday':
            return ($hour < 4) ? 'Su pedido será entregado mañana.' : 'Su pedido será entregado el Lunes.';
            break;
          case 'Saturday':
            return 'Su pedido será entregado el Lunes';
            break;
          default:
            return 'Las entregas se realizan los días Lunes, Miércoles y Viernes entre las 11:00hs y 14:00hs.';
            break;
      }
    }
}
