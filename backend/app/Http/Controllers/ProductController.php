<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Dotenv\Util\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $products = Product::all();
        return view("products.index", ["products" => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->all();
        $product = new Product();

        $product->name = $data['name'];
        $product->desc = $data['desc'];
        $product->price = $data['price'];
        $product->qty = $data['qty'];
        $product->category = $data['category'];

        $save = $product->save();

        return  response()->json([
            "message" => $save ? "Thee data has been inserted succeesfully!" : "Failed during inserting the dataa!",
            "data" => $product,
            "success" => $save
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Product::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $data = Product::find($id);

        $delete = $data->delete();

        return $delete ? "data has been removed:" : "error during  emmitting the dataa";


        // to restore the data;
        $restoreDataa = Product::withTrashed()->find($id)->restore();
    }
}
