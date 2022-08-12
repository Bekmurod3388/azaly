<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Custumers;
use App\Models\Custumer_category;
use App\Models\WareHous;
use App\Rules\PassportNumber;
use App\Rules\PhoneNumber;
use Illuminate\Http\Request;

class CustumersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Custumers::paginate(10);
        return view('admin.custumers.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $costumers = Category::all();
      return view('admin.custumers.create',[
          'cost'=> $costumers,
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
       //garakmidi
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
        $data = Custumers::find($id);
//        $costumers = WareHous::all();
        $category= Custumer_category::all();
        return view('admin.custumers.edit',[
            'custumers'=>$data,
            'cost'=> $category,

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
        $zz= Custumers::find($id);
        $zz->name=$request->name;
        $zz->phone=$request->phone;
        $zz->passport=$request->passport;
        $zz->cashback=$request->cashback;
        $zz->category_id=$request->category_id;

        $zz->save();

        return redirect()->route('admin.custumers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Custumers::find($id);
        $data->delete();
        return redirect()->route('admin.custumers.index');
    }
}
