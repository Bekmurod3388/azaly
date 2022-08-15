<?php

namespace App\Http\Controllers;

use App\Models\Kochirilganlar;
use App\Models\Move;
use App\Models\Move_log;
use App\Models\Product;
use App\Models\Product_log;
use App\Models\Purchases;
use App\Models\WareHous;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MoveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $id = $request['id'];
        $move_id = $request['move_id'];

        if ($id != NULL) {
            $layout = 'index';
            $sql = "SELECT product_logs.*,purchases.warehouse_id,products.name
            FROM product_logs
            INNER JOIN purchases
            ON product_logs.purchase_id =purchases.id
            inner join products on products.id =  product_logs.product_id
            where warehouse_id='$id' ";
            $products = DB::select($sql);
        }
        else {
            $layout = '';
            $products = Product::all();
        }

        $moves = Move::all();
        $move_logs = Move_log::where('id',$move_id)->first();
        $omborlar = WareHous::all();

        return view('admin.kochirish.index', [
            'moves' => $moves,
            'warehouses' => $omborlar,
            'layout' => $layout,
            'products'=>$products,
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kochir = new Move();
        $kochir->ombor1_id = $request->ombor1_id;
        $kochir->ombor2_id = $request->ombor2_id;
        $kochir->save();
        return redirect()->route('admin.moves.index')->with('success', 'Kochirish yoqildi');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Move $move
     * @return \Illuminate\Http\Response
     */
    public function show(Move $move)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Move $move
     * @return \Illuminate\Http\Response
     */
    public function edit(Move $move)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Move $move
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Move $move)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Move $move
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Move::find($id);
        $data->delete();
        return redirect()->route('admin.moves.index')->with('success', 'Kochirish ochirildi');

    }
}
