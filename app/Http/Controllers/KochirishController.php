<?php

namespace App\Http\Controllers;

use App\Models\Kochirish;
use App\Models\WareHous;
use Illuminate\Http\Request;

class KochirishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kochir=Kochirish::all();
//        dd($kochir);
        return  view('admin.kochirish.index',[
            'kochirish'=>$kochir
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
        return  view('admin.kochirish.create',[
            'kochirish'=>$kochir
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

        $kochir= new Kochirish();
        $kochir->ombor1=$request->ombor1;
        $kochir->ombor2=$request->ombor2;
        $kochir->save();
        return  redirect()->route('admin.kochirish.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kochirish  $kochirish
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kochir=Kochirish::find($id);
        return view('admin.kochirish.show',[
            'kochirish'=>$kochir
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kochirish  $kochirish
     * @return \Illuminate\Http\Response
     */
    public function edit(Kochirish $kochirish)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kochirish  $kochirish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kochirish $kochirish)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kochirish  $kochirish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kochirish $kochirish)
    {
        //
    }
}
