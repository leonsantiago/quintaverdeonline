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

            $orders = Order::whereBetween('created_at', [$from, $to])->get();
        }else{
            $orders = Order::all();
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
        $order_details = DB::table('order_details')
                                            ->join('products', 'order_details.product_id', '=', 'products.id')
                                            ->select('products.name', 'products.unit', DB::raw('sum(quantity) as quantity'))
                                            ->whereIn('order_id', $orders_id)
                                            ->groupBy('product_id')
                                            ->get();

        $orders = Order::whereIn('id', $orders_id);

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
