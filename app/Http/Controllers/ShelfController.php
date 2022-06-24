<?php

namespace App\Http\Controllers;

use App\Models\Shelf;
use App\Models\WareHous;
use Illuminate\Http\Request;

class ShelfController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:shelf-list|shelf-create|shelf-edit|shelf-delete', ['only' => ['index','show']]);
        $this->middleware('permission:shelf-create', ['only' => ['create','store']]);
        $this->middleware('permission:shelf-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:shelf-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->id;
        $shelf = Shelf::where('warehouse_id', $id)->get();
        return view('admin.shelf.index', [
            'shelfs' => $shelf,
            'id'=>$id,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id = $request->id;
        return view('admin.shelf.create', [
            'id'=>$id,
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
        $id = $request->id;
        $data = new Shelf();
        $data->warehouse_id = $request->id;
        $data->name = $request->name;
        $data->save();

        return redirect(route('admin.shelf.index', [ 'id' => $id]))->with('success','Yangi tokcha yaratildi!.. ');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id )
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {

        $data = Shelf::find($id);
        $warehouse= $request->id;
        return view('admin.shelf.edit', [
            'shelf' => $data,
            'id'=>$warehouse,
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
        $idd = $request->id;

        $data = Shelf::find($id);
        $data->name = $request->name;
        $data->save();
        return redirect(route('admin.shelf.index', [ 'id' => $idd]))->with('success','Ok!.. ');
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
        return redirect(route('admin.warehouses.index'))->with('success','Ok!.. ');
    }
}
