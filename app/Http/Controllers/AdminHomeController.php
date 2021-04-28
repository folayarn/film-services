<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Film;

class AdminHomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home');
    }


    
public function data(Request $request){
    $data = Film::orderby('id','asc')->paginate(10);
    
    if($request->ajax())
     {
return view('admin.pages.data2',compact('data'));
     }

     return view('admin.pages.data',compact('data'));
   
}


public function delete($id){
    $film=Film::find($id);
    $film->genres()->detach();
    $film->orders()->delete();
    $film->reviews()->delete();
    $film->transactions()->delete();
    $film->delete();
    return response('deleted');


}







}
