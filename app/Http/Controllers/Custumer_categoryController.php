<?php

namespace App\Http\Controllers;

use App\Models\Custumer_category;
use Illuminate\Http\Request;

class Custumer_categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Custumer_category::all();

        return view('admin.custumer_categories.index', [
            'custumer_categories' => $data,
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        Custumer_category::create($request->all());
        return redirect()->route('admin.custumer_categories.index');

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
//        Custumer_category::update($request->all());
        Custumer_category::where('id', $id)->update(['name' => $request->name,'sale'=>$request->sale]);
        return redirect()->route('admin.custumer_categories.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Custumer_category::find($id);
        $data->delete();
        return redirect()->route('admin.custumer_categories.index');
    }
}
