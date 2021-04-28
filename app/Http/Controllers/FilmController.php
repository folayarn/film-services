<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Film;
use App\Genre;
use App\Director;
use Cloudinary\Api\Upload\UploadApi;
use Cloudinary;

class FilmController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create_film');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'year'=>'required',
            'title'=>'required',
            'length' => 'required',
            'image'=>'required|image|between:1,6000',
            'director'=>'required',
            'data'=>'required',
            'price'=>'required|numeric'

            ]);
           $tags=$request->data;
            $image_name = $request->file('image')->getRealPath();
            $uploadedFileUrl = Cloudinary::upload($image_name)->getSecurePath();

             $film= new Film;

                $film->title=$request->title;
                $film->director_id=$request->director;
                $film->releaseYear=$request->year;
                $film->movieLength=$request->length;
                $film->image=$uploadedFileUrl;
                $film->price=$request->price;

                $film->save();
                foreach($tags as $c=> $genre){
                    $film->genres()->attach($genre);
                 }
            return redirect()->back()->with('success','save to database');


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
        $film=Film::find($id);
        return view('admin.pages.edit.create_film',compact('film'));
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


        $this->validate($request,[
            'year'=>'required',
            'title'=>'required',
            'length' => 'required',
            'image'=>'required|image|between:1,6000',
            'director'=>'required',
            'data'=>'required',
            'price'=>'required|number'
            ]);


           $tags=$request->data;
            $image_name = $request->file('image')->getRealPath();
            $uploadedFileUrl = Cloudinary::upload($image_name)->getSecurePath();

             $film= Film::find($id);
                $film->title=$request->title;
                $film->director_id=$request->director;
                $film->releaseYear=$request->year;
                $film->movieLength=$request->length;
                $film->image=$uploadedFileUrl;
                $film->price=$request->price;
                $film->save();
                $gen=$film->genres()->get();
                $film->genres()->detach($gen);
                foreach($tags as $c=> $genre){

                    $film->genres()->attach($genre);
                 }
            return redirect()->back()->with('success','Updated');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function storeDirector(Request $request){

        $this->validate($request,[

            'name'=>'required|string|unique:directors'

            ]);

             $director= new Director;
                $director->name=$request->name;
                $director->save();
            return response('save to the database');


    }

    public function storeGenre(Request $request){

        $this->validate($request,[

            'name'=>'required|string|unique:genres'

            ]);

             $genre= new Genre;
                $genre->name=$request->name;
                $genre->save();
            return response('save to the database');


    }
    public function getDirector(){
$director=Director::all();

return response($director);

    }

    public function getGenre(){
        $genre=Genre::all();
        return response($genre);
    }
}
