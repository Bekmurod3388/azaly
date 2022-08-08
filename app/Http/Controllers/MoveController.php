<?php

namespace App\Http\Controllers;

use App\Models\Move;
use Illuminate\Http\Request;

class MoveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kochir=Move::paginate(4);
        $kochir1=WareHous::all();

        return  view('admin.kochirish.index',[
            'kochirish'=>$kochir,
            'kochirish2'=>$kochir1
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
        $kochir->ombor1=$request->ombor1;
        $kochir->ombor2=$request->ombor2;
        $kochir->save();
        return  redirect()->route('admin.kochirish.index')->with('success', 'Agent yaratildi');
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
