<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePromotionRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Http\Request;
use PHPUnit\Framework\ComparisonMethodDoesNotDeclareBoolReturnTypeException;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('promotions.index',[
            'promotions' => Promotion::all(),
            'products' => Product::all(),
        ]);
    }

    public function new(){
        return view('promotions.new',[
            'products' => Product::all(),
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $products_id = $request['products'];
        return view('promotions.create', [
            'products' => Product::whereIn('id', $products_id)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePromotionRequest $request){


        $input = $request->all();
        $products = $request->input('products',[]);
        $quantities = $request->input('quantities', []);

        if ($image = $request->file('image')) {
            $name =  $request->input('name') . "_" . date('YmdHis');
            $destinationPath = 'image/promotions/';
            $profileImage = $name . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        $promotion = Promotion::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'image' => $input['image']
        ]);
        
        for ($product=0; $product < count($products); $product++) { 
            if ($products[$product] != '') {
                $promotion->products()->attach($products[$product], ['quantity' => $quantities[$product]]);

            }
        }

        return redirect()->route('promotions.index')->with('success', 'Promoción creada con éxito.');

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
        $promotion = Promotion::find($id);
        $products = Product::all();
        #dd($promotion);
        return view('promotions.edit', compact(['promotion', 'products']));
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
