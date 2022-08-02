<?php

namespace App\Http\Controllers;

use App\Models\Custumer_category;
use App\Models\Custumer_log;
use App\Models\Custumers;
use App\Models\Product;
use Illuminate\Http\Request;

class Custumer_logController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Custumer_log::all();
        $c = Custumer_category::all();
        $m = Custumers::all();
        $p = Product::all();
        return view('admin.custumer_logs.index', [
            'custumer_logs' => $data,
            'customer_categories'=>$c,
            'custumers'=>$m,
            'products'=>$p,
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
        Custumer_log::create($request->all());

        return redirect()->route('admin.custumer_logs.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Custumer_log::where('id', $id)->update(['custumer_id'=>$request->custumer_id,'product_id'=>$request->product_id,'custumer_category_id'=>$request->custumer_category_id,'price' => $request->price,'count'=>$request->count]);
        return redirect()->route('admin.custumer_logs.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Custumer_log::find($id);
        $data->delete();
        return redirect()->route('admin.custumer_logs.index');
    }
}
