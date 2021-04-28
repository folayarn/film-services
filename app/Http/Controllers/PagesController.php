<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Film;
use App\Review;
use App\User;
use CreateFilmsTable;
use Illuminate\Support\Facades\Hash;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','searchFilm']]);
    }

public function updateUser(){
$user=User::find(auth()->user()->id);

return view('pages.edit_user_data',compact('user'));
}

public function updateAccount(Request $request,$id){

$this->validate($request,[
'name'=>'required',
'dob'=>'required',
]);

$user=User::find($id);
$user->name=$request->name;
$user->dob=$request->dob;
$user->save();
return back()->with('Success','Account Updated Succesfully');

}

public function changePassword(Request $request, $id){

    $this->validate($request,[
        'old'=>'required',
        'password'=>'required',
        'confirm_password'=>'required'
        ]);

        if($request->password == $request->confirm_password){
            $user=User::find($id);
            if(Hash::check($request->old, $user->password)){
                $request->user()->fill([
                    'password' => Hash::make($request->password)
                ])->save();
    return back()->with('Success','Password Updated Succesfully');
            }else{
                return back()->with('error','Password not Found');
            }
        }else{
            return back()->with('error','Password must Match');

        }
}
    public  function index(){
$film=Film::orderby('created_at','desc')->get();
        return view('welcome',compact('film'));
    }

public function postReview(Request $request ){
    $this->validate($request,[
        'review'=>'required',
        'film_id'=>'required'
        ]);
         $review=new Review();
            $review->film_id=$request->film_id;
            $review->body=$request->review;
            $review->user_id=auth()->user()->id;
            $review->save();
        return response('success');
}

public function getReview(Request $request ,$id){
    if($request->ajax()){
        $film=Film::find($id);
        $data= $film->reviews()->orderby('created_at','desc')->get();
        $output = '';
        if (count($data)>0) {
            foreach($data as $row){
                $output.='<div style="margin:10px 0px 10px 0px" class="card text-white bg-dark"><div class="card-body">'. $row->body.'</span>
                <br/>
               <div style="color: darkgrey"> <span class="card-text">'.$row->created_at->diffForHumans().'</span>
                <span class=" pull-right" > Posted by <i style="color: darkgrey" >'.$row->user->name.'</i></span>
           </div>
                </div>

                </div>';
                   }

return $output;

        }else{

         return   $output.="<h4 class='text-center'>No Review yet </h4>";

        }

    }
}

public function transactionHistory(){
$user=User::find(auth()->user()->id);
$transaction=$user->transactions()->get();
    return view('pages.transaction',compact('transaction'));
}

public function order(){
    $user=User::find(auth()->user()->id);
    $order=$user->orders()->get();
        return view('pages.order',compact('order'));
    }

public function searchFilm(Request $request){

    if($request->ajax()) {

        $data = Film::where('title', 'LIKE',$request->search.'%')->get();


     $output = '';

        if (count($data)>0){
           
                
            foreach($data as $row){
                

               $output.=' <a href="'.url('show',$row->id).'"><div class="list-group-item"><img src="'.$row->image.'" heigth="50" width="50" />'.$row->title. '<span style="float:right; color:grey" > <span class="fa fa-stopwatch"></span>'.$row->created_at->diffForHumans().'</span></div></a>';
                
            
                   }
           
                           return   $output;
           

}else{
    $output='<div class="list-group-item text-center"> No data </div>';
             

}

return $output;

    }
}


}