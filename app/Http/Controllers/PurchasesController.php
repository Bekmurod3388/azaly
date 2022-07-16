<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Category;
use App\Models\Product;
use App\Models\Purchases;
use App\Models\Shelf;
use App\Models\Size;
use App\Models\WareHous;
use Illuminate\Http\Request;

class PurchasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request['id'];

        if ($id != NULL)
            $layout = 'index';
        else
            $layout = '';

        if ($id != NULL) {
            $ombor_id = Purchases::find($id)->warehouse_id;
            $idi = Purchases::find($id);
            $idd = $idi->id;
        } else
            $idd = 0;


        $date = Purchases::OrderBy('id', 'desc')->paginate(4);
        $kontr = Agent::all();
        $ware = WareHous::all();
        $cotegory = Category::all();
        $product_all = Product::all();


        if ($id == NULL)
            $product = Product::all();
        else
            $product = Product::where('purchase_id', $id)->get();
        $size = Size::all();
        if ($id == NULL)
            $shelf = Shelf::all();
        else
            $shelf = Shelf::where('warehouse_id', $ombor_id)->get();


        return view('admin.products.index', [
            'purchases' => $date,
            'agent' => $kontr,
            'ware' => $ware,
            'cotegory' => $cotegory,
            'products' => $product,
            'product_all' => $product_all,
            'size' => $size,
            'shelfs' => $shelf,
            'layout' => $layout,
            'idd' => $idd,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kontr = Agent::all();
        $ware = WareHous::all();
        $date = Product::all();

        return view('admin.products.create', [
            'agent' => $kontr,
            'ware' => $ware,
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
        Purchases::create($request->all());
        return redirect()->route('admin.purchases.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $date = Purchases::OrderBy('id', 'desc')->get();
        $donodono = Purchases::find($id);
        $kontr = Agent::all();
        $ware = WareHous::all();
        $cotegory = Category::all();
        $product = Product::all();
        return view('admin.products.index', [
            'purchases' => $date,
            'agent' => $kontr,
            'ware' => $ware,
            'cotegory' => $cotegory,
            'products' => $product,
            'dono' => $donodono,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pur = Purchases::find($id);
        $kontr = Agent::all();
        $ware = WareHous::all();
        return view('admin.products.edit', [
            'pur' => $pur,
            'agent' => $kontr,
            'ware' => $ware,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $date = Purchases::find($id);
        $date->warehouse_id = $request->warehouse_id;
        $date->save();
        return redirect()->route('admin.purchases.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $date = Purchases::find($id);
        $date->delete();
        return redirect()->route('admin.purchases.index');
    }
    public  function baho(Request $request){

        $id=$request->id;
        $products=Product::where('purchase_id',$id)->get();
        foreach ($products as $product){
            $product['sum_came']+=$request->baho;
            $product->save();
        }
        $count = $products->count();
        $allsum=Purchases::find($id);
        //dd($allsum);
        $allsum['AllSum']+=($request['baho']*$count);
        $allsum->save();

        return redirect()->route('admin.purchases.index');
    }
}
