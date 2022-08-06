<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Category;
use App\Models\Product;
use App\Models\Product_log;
use App\Models\Purchases;
use App\Models\Qaytganlar;
use App\Models\Shelf;
use App\Models\Size;
use App\Models\WareHous;
use Illuminate\Http\Request;

class QaytishController extends Controller
{
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
        $product_log_all = Product_log::all();


        if ($id == NULL)
            $product_log = Product_log::all();
        else
            $product_log = Product_log::where('purchase_id', $id)->get();
        $size = Size::all();
        if ($id == NULL)
            $shelf = Shelf::all();
        else
            $shelf = Shelf::where('warehouse_id', $ombor_id)->get();


        return view('admin.menu.return', [
            'purchases' => $date,
            'agent' => $kontr,
            'ware' => $ware,
            'cotegory' => $cotegory,
            'product_logs' => $product_log,
            'product_log_all' => $product_log_all,
            'product_all' => $product_all,
            'products' => $product_all,
            'size' => $size,
            'shelfs' => $shelf,
            'layout' => $layout,
            'idd' => $idd,
        ]);
    }


    public function store(Request $request)
    {

        $xarid = Purchases::where('id', $request->purchase_id)->get();
        $maxsulot = Product_log::where('product_id', $request->product_id)->where('purchase_id', $request->purchase_id)->get();

        $date = new Qaytganlar();
        if($maxsulot['0']['count']>=$request->soni){
            $date->soni = $request->soni;
            $date->product_id = $request->product_id;
            $date->purchase_id =   $request->purchase_id;
            $date->agent_id = $xarid['0']['kontragent_id'];
            $date->shelf_id = $maxsulot['0']['shelf_id'];
            $date->save();

            $maxsulot['0']['count']= $maxsulot['0']['count']-$request->soni;
            $xarid['0']['AllSum'] =  $xarid['0']['AllSum'] - ($request->soni*$maxsulot['0']['sum_came']);
            $maxsulot['0']->save();
            $xarid['0']->save();
        }else{
            return redirect()->back()
                ->withErrors("Noto'g'ri miqdor kiritdingiz !");
        }

        return redirect()->route('admin.return.index');


    }

    public  function show(){

        $data = Qaytganlar::all();

        return view('admin.menu.historyes',[
            'products'=>$data,
        ]);


    }


}
