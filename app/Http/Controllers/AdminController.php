<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

    public function orders(Request $request)
    {
        if (isset($_GET['initial_date'])){
            $from = $_GET['initial_date'];
            $to = $_GET['end_date'] ?: date('Y-m-d');
            $orders = Order::whereBetween('created_at', [$from, $to])->get();
        }else{
            $orders = Order::all();
        }
        $orders_id = $orders->pluck('id')->toArray();
        return view('admin.orders.orders', compact('orders', 'orders_id'));

    }

    public function products()
    {
        $products = Product::all()
            ->sortBy('name');
        return view('admin.products', compact('products'));
    }
    public function shopping()
    {
        return view('admin.shopping');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function show_order($id){
        $order = Order::find($id);
        return view('admin.orders.show',[
            'order' => Order::findOrFail($id)
        ] );
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
