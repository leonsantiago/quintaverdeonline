<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetail;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function index(){
        return view('admin.index');
    }

    public function orders(Request $request){
        if (isset($_GET['initial_date'])){
            $from = $_GET['initial_date'];
            if(isset($_GET['end_date'])){
              $to = $_GET['end_date'];
            }else{
              $to = date('Y-m-d');
            }

            $orders = Order::whereBetween('created_at', [$from, $to])->orderBy('created_at', 'desc')->get();
        }else{
            $orders = Order::all()->sortByDesc('created_at');
        }

        $orders_id = $orders->pluck('id')->toArray();
        return view('admin.orders.orders', compact('orders', 'orders_id'));

    }

    public function products(){
        $products = Product::all()
            ->sortBy('name');
        return view('admin.products', compact('products'));
    }
    public function shopping(Request $request){
        $orders_id = $request['orders'];
        $date = date('d-m-Y');
        $orders = Order::whereIn('id', $orders_id);
        
        // Products quantity by promotions
        $order_details = OrderDetail::whereIn('order_id', $orders_id)->get();
        $order_promotions = [];
        foreach ($order_details as $detail){
          if ($detail->promotion_id) {
            //store all orders_details with promotion on a array
            $order_promotions[] = $detail->id;
          }
        }
        //quantities by each promotion
        $order_promotion_quantity = DB::table('order_details')
          ->select('promotion_id', DB::raw('sum(quantity) as quantity'))
          ->whereIn('id', $order_promotions)
          ->groupBy('promotion_id')
          ->get();

        
        $order_promotion_details = DB::table('order_details')
          ->join('promotion_details', 'order_details.promotion_id', '=', 'promotion_details.promotion_id')
          ->select('promotion_details.product_id', DB::raw('sum(order_details.quantity * promotion_details.quantity) as total'))
          ->whereIn('order_details.order_id', $orders_id)
          ->groupBy('promotion_details.product_id')
          ->get();

        // Products quantity by products itself
        
        $order_product_details = DB::table('order_details')
          ->join('products', 'order_details.product_id', '=', 'products.id')
          ->select('product_id', DB::raw('sum(quantity) as total'))
          ->whereIn('order_id', $orders_id)
          ->groupBy('product_id')
          ->get();

          $merged = $order_product_details->merge($order_promotion_details);
          $merged = $merged->sort();
          $result= [];
          foreach ($merged as $m){
            if (empty($result[$m->product_id])){
              $total = (float)($m->total);
              $result[$m->product_id]['name'] = Product::find($m->product_id)->name;
              $result[$m->product_id]['unit'] = Product::find($m->product_id)->unit;
              $result[$m->product_id]['total'] = $total;
            }else{
              $total += (float)($m->total);
              $result[$m->product_id]['total'] = $total;
            }
          }

          $order_details = $result;
          
        $pdf = PDF::loadView('admin/shopping', compact('order_details', 'orders'));
        $pdf->setPaper('a4');
        return $pdf->download("Compras-{$date}.pdf");
    }

    
    public function show_order($id){
        $order = Order::find($id);
        return view('admin.orders.show',[
            'order' => Order::findOrFail($id)
        ] );
    }

    public function print(Request $request){

        $orders_id = $request['orders'];
        $orders = Order::whereIn('id', $orders_id)->get();
        $date = date('d-m-Y');
        $pdf = PDF::loadView('admin/orders/print', compact('orders'));
        $pdf->setPaper('a4');
        return $pdf->download("Pedidos{$date}.pdf");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
