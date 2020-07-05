<?php

namespace App\Http\Controllers;

use App\Product;


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
        return view('home');
    }
    public function store(){

        if(session()->has('req')){

            toast( session()->get('msg'), session()->get('req'));
        }

      // select * from products -[latest] order by id desc -[take] limit 3 ;
       $latestProducts = Product::latest('id')->take(3)->get();

       return view('store', compact('latestProducts'));
    }
}
