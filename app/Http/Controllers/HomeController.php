<?php

namespace App\Http\Controllers;

use App\Models\Disposisi;
use App\Models\Suratkeluar;
use App\Models\Suratmasuk;
use Illuminate\Http\Request;

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

        $countmasuk = Suratmasuk::count();
        $countkeluar = Suratkeluar::count();
        $countdisposisi = Disposisi::count();
        return view('home',compact('countmasuk','countkeluar','countdisposisi'));
    }
}
