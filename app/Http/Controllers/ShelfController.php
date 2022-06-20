<?php

namespace App\Http\Controllers;

use App\Models\Shelf;
use App\Models\WareHous;
use Illuminate\Http\Request;

class ShelfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shelf = Shelf::all();
        $house = WareHous::all();
        return view('admin.shelf.index', [
            'shelfs' => $shelf,
            'house' => $house,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shelf = WareHous::orderBydesc('id')->get();
        return view('admin.shelf.create', [
            'shelfs' => $shelf
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Shelf();
        $data->warehouse_id = $request->warehouse_id;
        $data->name = $request->name;
        $data->save();

        return redirect(route('admin.shelf.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Shelf::find($id);
        return view('admin.shelf.edit', [
            'shelf' => $data,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Shelf::find($id);
        $data->name = $request->name;
        $data->save();
        return redirect(route('admin.shelf.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Shelf::find($id);
        $data->delete();
        return redirect(route('admin.shelf.index'));
    }
}
