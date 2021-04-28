<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Film;

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

    public function show($id){

        $film=Film::find($id);

        return view('pages.show',compact('film'));


        }
        public function success(){
            return view('pages.success');
        }
        public function fail(){
            return view('pages.fail');
        }
}
