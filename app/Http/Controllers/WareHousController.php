<?php

namespace App\Http\Controllers;

use App\Models\WareHous;
use Illuminate\Http\Request;

class WareHousController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $warehouses=WareHous::paginate(10);
        return  view('admin.warehouses.index',[
            'warehouses'=>$warehouses
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.warehouses.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'name'=>'required|unique:ware_houses,name'
        ]);
        WareHous::create($request->all());
        return redirect()->route('admin.warehouses.index')->with('success','Warehous Name yaratildi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WareHous  $workHous
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ware=WareHous::findor($id);
        return view('admin.warehouses.show',[
            'warehouses'=>$ware
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WareHous  $workHous
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $warehouses=WareHous::findor($id);
        return  view('admin.warehouses.edit',compact('warehouses'))->with('success','Warehous tahrirlandi');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WareHous  $workHous
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $wareHous=$request->validate([
            'name'=>'required|unique:ware_houses,name'
        ]);
        $wareHous =  WareHous::findor($id);
        $wareHous['name'] = $request['name'];
        $wareHous->save();
        return redirect()->route('admin.warehouses.index')->with('success','warehoues created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WareHous  $wareHous
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $data=WareHous::find($id);
        $data->delete();
        return redirect()->route('admin.warehouses.index')->with('success','warehoues created successfully');

    }
}
