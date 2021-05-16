<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function newOrder(){
        $quantity = $_POST['quantity'];
        $products_order = $_POST['products'];
        $products = Product::whereIn('id', $products_order)->get();
        return view('orders/new', compact('products', 'quantity'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = User::create([
            'name' => $request->input('name'),
            'lastname' => $request->input('lastname'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
        ]);

        $products = $request->input('products');
        $quantities = $request->input('quantity', []);

        $order = Order::create([
            'user_id' => $client->id,
            'payment_type' => $request->payment_type,
            'total' => $request->total,
        ]);
        for($product = 1; $product <= count($products); $product++){
            $order->products()->attach($products[$product], ['quantity' => $quantities[$product]]);
        }

        return redirect()->route('order/show', ['id' =>$order->id])->with('success', 'Su pedido fue realizado con éxito.');
        //return view('orders/show', compact('order', 'client'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        $client = $order->user()->get();
        return view('orders/show', compact('order', 'client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        return view('order.edit', compact('order'));
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
