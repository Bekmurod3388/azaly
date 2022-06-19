<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        $cnt = 0;
//        foreach (Auth::user()->getRoleNames() as $v)
//            if ($v == 'Admin') $cnt++;
////        dd($cnt);
        return view('admin.dashboard', [
//            'cnt' => $cnt,
        ]);
//        if ($cnt > 0)
//            return view('admin.dashboard');
//        else return view('admin.user');
    }
}
