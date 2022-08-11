<?php

namespace App\Http\Controllers;

use App\Models\Move;
use App\Models\Product;
use App\Models\Purchases;
use App\Models\WareHous;
use Illuminate\Http\Request;

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
        if ($id != NULL){
            $layout = 'index';
            $ombor_id = Purchases::find($id)->get();
            dd($ombor_id);
        }
        else{
            $layout = '';
        }

        $kochir1=Move::paginate(4);
        $kochir2=WareHous::all();

        return  view('admin.kochirish.index',[
            'kochirish'=>$kochir1,
            'kochirish2'=>$kochir2,
            'layout'=>$layout,

        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kochir=WareHous::all();
        return  view('admin.kochirish.index',[
            'kochirish2'=>$kochir
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kochir= new Move();
        $kochir->ombor1_id=$request->ombor1_id;
        $kochir->ombor2_id=$request->ombor2_id;
        $kochir->save();
        return  redirect()->route('admin.moves.index')->with('success', 'Agent yaratildi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Move  $move
     * @return \Illuminate\Http\Response
     */
    public function show(Move $move)
    {
      //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Move  $move
     * @return \Illuminate\Http\Response
     */
    public function edit(Move $move)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Move  $move
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Move $move)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Move  $move
     * @return \Illuminate\Http\Response
     */
    public function destroy(Move $move)
    {
        //
    }
}
