<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Product_warehouse;
use App\Models\Purchases;
use App\Models\Shelf;
use App\Models\Size;
use App\Models\WareHous;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:product-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit', 'update']]);
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
        $products = Product::all();
        $shelf = Shelf::all();
        $ware = WareHous::all();
        $cate = Category::all();
        return view('admin.products.create', [
            'size' => $size,
            'shelf' => $shelf,
            'ware' => $ware,
            'cate' => $cate,
            'products' => $products
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
        $date->code = $request->code;
        $date->purchase_id = $request->purchase_id;
        $date->name = $request->name;
        $date->sum_sell_optom = $request->sum_sell_optom;
        $date->count = $request->count;
        $date->category_id = $request->category_id;
        $date->sum_came = $request->sum_came;
        $date->percent = $request->percent;
        $date->sum_sell = $request->sum_sell;
        $date->shelf_id = $request->shelf_id;
        $date->status = $request->status;
        $date->artikul = $request->artikul;
        $date->save();

        $pp = Purchases::find($request->purchase_id);
        $oldSum = $pp->AllSum;
        $pp->AllSum = $oldSum + $date->sum_came;
        $pp->save();


//        if ($request->size_id != NULL) {
//            foreach ($request->size_id as $size) {
//                $data = new Product_warehouse();
//                $data->shelf_id = $request->shelf_id;
//                $data->product_id = $date->id;
//                $data->count = $request->count;
//                $data->size_id = $size;
//                $data->save();
//            }
//        } else {
//            return redirect()->back()->withErrors(' kamida 1 ta kategoriyta tanlanishi kerak');
//        }

        return redirect()->route('admin.purchases.index');
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
        $shelfs = Shelf::all();
        return view('admin.products.show', [
            'product' => $date,
            'cate' => $cate,
            'shelfs' => $shelfs,
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
            'pro_ware' => $product_warehouse,
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
        $date->code = $request->code;
        $date->purchase_id = $request->purchase_id;
        $date->name = $request->name;
        $date->artikul = $request->artikul;
        $date->category_id = $request->category_id;
        $date->sum_came = $request->sum_came;
        $date->status = $request->status;
        $date->count = $request->count;
        $date->percent = $request->percent;
        $date->sum_sell_optom = $request->sum_sell_optom;
        $date->sum_sell = $request->sum_sell;
        $date->shelf_id = $request->shelf_id;
        $date->save();

        return redirect()->route('admin.purchases.index');
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
        return redirect()->route('admin.purchases.index');
    }
}
