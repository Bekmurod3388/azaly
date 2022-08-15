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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $request->validate([
//            'count' => 'max:100'
//        ]);

        $data = new Move_log();
        $data->move_id = $move_id;
        $data->product_id = $request->product_id;
        $data->count = $request->count;

        $id = $request->product_id;
        $p = Product_log::where('product_id',$id)->first();
//        dd($p->purchase_id);
//        $o = Purchases::find($idd);

        if ( $request->count <= $p->count ){
            $p->count -= $request->count;
            $p->save();
            $data->save();
        }
        else{

        }

        return redirect()->route('admin.moves.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Move_log  $move_log
     * @return \Illuminate\Http\Response
     */
    public function show(Move_log $move_log)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Move_log  $move_log
     * @return \Illuminate\Http\Response
     */
    public function edit(Move_log $move_log)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Move_log  $move_log
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Move_log $move_log)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Move_log  $move_log
     * @return \Illuminate\Http\Response
     */
    public function destroy(Move_log $move_log)
    {
        //
    }
}
