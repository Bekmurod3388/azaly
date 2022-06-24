<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Product_warehouse;
use App\Models\Shelf;
use App\Models\Size;
use App\Models\WareHous;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
        $this->middleware('permission:product-create', ['only' => ['create','store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = Product::all();
        return view('admin.products.index', [
            'products' => $date,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $size = Size::all();
        $shelf = Shelf::all();
        $ware = WareHous::all();
        $cate = Category::all();
        return view('admin.products.create', [
            'size' => $size,
            'shelf' => $shelf,
            'ware' => $ware,
            'cate' => $cate,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = new Product();
        $date->name = $request->name;
        $date->buy_sum = $request->buy_sum;
        $date->sell_sum = $request->sell_sum;
        $date->sell_sale_sum = $request->sell_sale_sum;
        $date->sale_count = $request->sale_count;
        $date->category_id = $request->category_id;
        $date->sale = $request->sale;
        $date->save();
        if ($request->size_id != NULL) {
            foreach ($request->size_id as $size) {
                $data = new Product_warehouse();
                $data->shelf_id = $request->shelf_id;
                $data->product_id = $date->id;
                $data->count = $request->count;
                $data->size_id = $size;
                $data->save();
            }
        } else {
            return redirect()->back()->withErrors(' kamida 1 ta kategoriyta tanlanishi kerak');
        }
        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $date = Product::find($id);
        $cate = Category::all();
        return view('admin.products.show', [
            'product' => $date,
            'cate' => $cate,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product_id = $id;
        $product = Product::find($id);
        $product_warehouse = Product_warehouse::find($product_id);
        $size = Size::all();
        $shelf = Shelf::all();
        $ware = WareHous::all();
        $cate = Category::all();
        return view('admin.products.edit', [
            'product' => $product,
            'pro_ware'=>$product_warehouse,
            'size' => $size,
            'shelf' => $shelf,
            'ware' => $ware,
            'cate' => $cate,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $date = Product::find($id);
        $date->name = $request->name;
        $date->buy_sum = $request->buy_sum;
        $date->sell_sum = $request->sell_sum;
        $date->sell_sale_sum = $request->sell_sale_sum;
        $date->sale_count = $request->sale_count;
        $date->category_id = $request->category_id;
        $date->sale = $request->sale;
        $date->save();

        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index');
    }
}
