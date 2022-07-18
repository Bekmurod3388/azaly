<?php

namespace App\Http\Controllers;

use App\Models\Sendback;
use Illuminate\Http\Request;

class SendbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.sendback.index');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sendback  $sendback
     * @return \Illuminate\Http\Response
     */
    public function show(Sendback $sendback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sendback  $sendback
     * @return \Illuminate\Http\Response
     */
    public function edit(Sendback $sendback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sendback  $sendback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sendback $sendback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sendback  $sendback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sendback $sendback)
    {
        //
    }
}
