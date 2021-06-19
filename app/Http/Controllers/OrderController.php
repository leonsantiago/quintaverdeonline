<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use App\Models\Product;
use App\Models\Promotion;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Validator;


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
    public function create(){
      if (isset($_GET['promotions'])) {
        $promotions = $_GET['promotions'];
        $promotions = Promotion::whereIn('id', $promotions)->get();
        $promotion_quantities = $_GET['promotion_quantity'];
      }else{
        $promotions = [];
        $promotion_quantities = [];
      }
      if (isset($_GET['products'])) {
        $quantity = $_GET['quantity'];
        $products_order = $_GET['products'];
        $products = Product::whereIn('id', $products_order)->get();
      }else{
        $products = [];
        $quantity = [];
      }
        return view('orders/create', compact('products', 'quantity', 'promotions', 'promotion_quantities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request){
      $client = User::create([
        'name' => $request->input('name'),
        'lastname' => $request->input('lastname'),
        'phone' => $request->input('phone'),
        'address' => $request->input('address'),
      ]);
      
      $order = Order::create([
        'user_id' => $client->id,
        'payment_type' => $request->payment_type,
        'total' => $request->total,
      ]);

      //Promotions
      $promotions = $request->input('promotions');
      if (count($promotions)) {
        $promotion_quantities = $request->input('promotions_quantity', []);
        for ($promotion = 1; $promotion <= count($promotions); $promotion++){ 
          $order->promotions()->attach($promotions[$promotion], ['quantity' => $promotion_quantities[$promotion]]);
        }
      }
      
      //Products
      $products = $request->input('products');
      if (count($products)) {
        $quantities = $request->input('quantity', []);
        for($product = 1; $product <= count($products); $product++){
          $order->products()->attach($products[$product], ['quantity' => $quantities[$product]]);
        }
      }

      
      return redirect()->route('orders.show', ['id' =>$order->id])->with('success', 'Su pedido fue realizado con éxito.');
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
        $client = $order->user()->first();
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
        return view('orders.edit', compact('order'));
    }

    public function generatePDF($id){
        $order = Order::find($id);
        $client = $order->user()->first();
        $products = $order->products()->get();

        $pdf = PDF::loadView('orders/printable', compact('order', 'client', 'products'));
        return $pdf->download("OrdenNro{$order->id}.pdf");
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
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->route('admin.orders.index')->with('success', 'Su pedido fue eliminado con éxito.');
    }
}
