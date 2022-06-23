<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

         $size = Size::all();
         return view('admin.sizes.index',[
             'sizes'=>$size,
         ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sizes.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
           'size' => 'unique:sizes'
        ]);
        Size::create($data);
        return redirect()->route('admin.sizes.index')->with('success', 'Size yaratildi');
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
        $data = Size::find($id);
        return view('admin.sizes.edit',[
            'size' => $data,
        ]);

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
//        Size::where('id', $id)->update($request->all());
        $d = $request->validate([
            'size' => 'unique'
        ]);
        $data = Size::find($id);
        $data->Size = $d->size;
        $data->save();
        return redirect()->route('admin.sizes.index')->with('success', 'Size o`zgartirildi.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Size::find($id);
        $data->delete();
        return redirect()->route('admin.sizes.index')->with('success', 'Size o`chirildi');

    }
}
