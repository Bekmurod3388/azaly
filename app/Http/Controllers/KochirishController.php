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
    public function index(Request $request)
    {
$id = $request['id'];
dd($id);
        if ($id != NULL)
            $layout = 'index';
        else
            $layout = '';
        $kochir=Kochirish::find($id);
        $kochir=Kochirish::paginate(4);
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
//        dd($kochir);
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

        $kochir= new Kochirish();
        $kochir->ombor1=$request->ombor1;
        $kochir->ombor2=$request->ombor2;
        $kochir->save();
        return  redirect()->route('admin.kochirish.index')->with('success', 'Agent yaratildi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kochirish  $kochirish
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


//        dd($kochir);

        return view('admin.kochirish.index',[
            'kochirish'=>$kochir,
            'layout'=>$layout

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
