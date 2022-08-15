<?php

namespace App\Http\Controllers;

use App\Models\Move_log;
use App\Models\Product;
use App\Models\Product_log;
use App\Models\Purchases;
use Illuminate\Http\Request;

class MoveLogController extends Controller
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
        $data = new Move_log();
        $data->move_id = $request->move_id;
        $data->product_id = $request->product_id;
        $data->count = $request->count;

        $top = Product_log::where('product_id', $request->product_id)->first();
        $top->current_count -= $request->count;

        $date = new Product_log();
        $date->purchase_id = $request->move_id;
        $date->product_id = $request->product_id;
        $date->sum_came = $top->sum_came;
        $date->count = $request->count;
        $date->current_count = $request->count;
        $date->shelf_id = $top->shelf_id;

            $data->save();
            $date->save();
            $top->save();
            return redirect()->route('admin.moves.index')->with('success', ' Amal muoffaqiyatli ');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Move_log $move_log
     * @return \Illuminate\Http\Response
     */
    public function show(Move_log $move_log)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Move_log $move_log
     * @return \Illuminate\Http\Response
     */
    public function edit(Move_log $move_log)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Move_log $move_log
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Move_log $move_log)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Move_log $move_log
     * @return \Illuminate\Http\Response
     */
    public function destroy(Move_log $move_log)
    {
        //
    }
}
