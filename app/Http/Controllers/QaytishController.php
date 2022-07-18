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

class QaytishController extends Controller
{
    public function index(Request $request){

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
}
