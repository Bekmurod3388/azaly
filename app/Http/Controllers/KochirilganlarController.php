<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Category;
use App\Models\Kochirilganlar;
use App\Models\Kochirish;
use App\Models\Move;
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

//
        $idd= $request['id'];

     $logika=Kochirilganlar::where('kochirish_id', $idd)->get();
//dd($logika);

        $kochirish=Move::paginate(4);
        $kochirilganlar=Kochirilganlar::paginate(6);
        $warehouse=WareHous::all();


        return view('admin.kochirish.index',compact(
            'warehouse',
            'kochirish',
            'kochirilganlar',
            'logika',
            'idd'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {

        return  view('admin.kochirish.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
//
//        dd($request);
//        dd($request->idd);
        $kochir=$request->validate(
            [
                'nomi'=>'required',
                'soni'=>'required',
                'bahosi'=>'required'
                ]

        );
        $kochirish=new Kochirilganlar();
        $kochirish->nomi=$request->nomi;
        $kochirish->soni=$request->soni;
        $kochirish->bahosi=$request->bahosi;
        $kochirish->kochirish_id=$request->kochirish_id;
//        dd($request->kochirish_id);

        $kochirish->save();

        return  view('admin.kochirish.index');
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
