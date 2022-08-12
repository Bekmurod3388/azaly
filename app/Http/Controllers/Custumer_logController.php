<?php

namespace App\Http\Controllers;

use App\Models\Custumer_category;
use App\Models\Custumer_log;
use App\Models\Custumers;
use App\Models\Product;
use App\Models\Product_log;
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
        $log=new Custumer_log();
        $products=Product_log::where('product_id',$request->product_id)->get();
        $umumiySoni=$products->sum('current_count');
        $zarur=$request->count;
        if($umumiySoni<$request->count){
            return redirect()->back()->withErrors("Ushbu turdagi mahsulotdan $umumiySoni ta mavjud. Siz $zarur ta sotmoqchisiz.");
        }
        foreach ($products as $product){
           if( $product->current_count>$zarur){
               $p=Product_log::find($product->id);
               $p->current_count-=$zarur;
               $p->save();
               break;
           }
           else{
               $zarur-=$product->current_count;
               $p=Product_log::find($product->id);
               $p->current_count=0;
               $p->save();
           }
        }

        $idsi=0;
        if($request->is_new==1){
            $mijoz=new Custumers();
            $mijoz->name=$request->mijoz_name;
            $mijoz->category_id=$request->category_id;
            $mijoz->passport=$request->mijoz_passport;
            $mijoz->phone=$request->mijoz_telefon;
            $mijoz->save();
            $idsi=$mijoz->id;
        }else{
            $idsi=$request->custumer_id;
        }
        $log->custumer_id=$idsi;
        $log->product_id=$request->product_id;
        $log->count=$request->count;

        $product=Product::find($request->product_id);
        if($request->count >$product->count_sell_optom){
            $log->price=$request->count*$product->sum_sell_optom;
        } else{
            $log->price=$request->count*$product->sum_sell;
        }
        $custumer=Custumers::find($idsi);
        $custumer->bonus_money+=$log->price*$custumer->cashback/100;
        $custumer->save();

        $log->save();
        return redirect()->route('admin.custumer_logs.index')->with('success','yaratildi');

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
        Custumer_log::where('id', $id)->
        update(['custumer_id'=>$request->custumer_id,
            'product_id'=>$request->product_id,
            'custumer_category_id'=>$request->custumer_category_id,
            'price' => $request->price,
            'count'=>$request->count]);
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
