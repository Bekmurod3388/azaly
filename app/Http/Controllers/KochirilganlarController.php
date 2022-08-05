<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Category;
use App\Models\Kochirilganlar;
use App\Models\Product;
use App\Models\Product_log;
use App\Models\Purchases;
use App\Models\Shelf;
use App\Models\Size;
use App\Models\WareHous;
use Illuminate\Http\Request;

class KochirilganlarController extends Controller
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


        return view('admin.kochirish.show', [
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
        //
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
     * @param  \App\Models\Kochirilganlar  $kochirilganlar
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        if ($id != NULL)
            $layout = 'index';
        else
            $layout = '';

        if ($id != NULL) {
            $ombor_id = Purchases::find($id);
//            $idi = Purchases::find($id);

        } else
            $idd = 0;
        return view('admin.kochirish.index', [
            'layout'=>$layout,
            'ombor'=>$ombor_id,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kochirilganlar  $kochirilganlar
     * @return \Illuminate\Http\Response
     */
    public function edit(Kochirilganlar $kochirilganlar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kochirilganlar  $kochirilganlar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kochirilganlar $kochirilganlar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kochirilganlar  $kochirilganlar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kochirilganlar $kochirilganlar)
    {
        //
    }
}
