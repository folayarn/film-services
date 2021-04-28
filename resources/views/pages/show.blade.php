@extends('layouts.app')

@section('content')

<div class="container" style="margin-top:30px">
<div class="row">
<div class="col-md-3">

</div>

<div class="col-md-6">
@if ($message = Session::get('msg'))
<div class="alert alert-danger"  role="alert" >

      {{ $message }}

</div>
@endif

<div>
<input type="hidden" value={{$film->id}} name="id"/>
<img src="{{$film->image}}" class="img-fluid" />
</div>

<div>
<table class="table table-dark">
      <tbody>
        <tr>
          <td> Movie Length</td>
          <td> {{$film->movieLength}}</td>
        </tr>

        <tr>
          <td>Genre</td>
          <td> @foreach($film->genres as $k => $val)

            {{$val->name}}
          @endforeach</td>
        </tr>
        <tr>
          <td> Directors</td>
          <td> {{$film->director->name}}</td>
        </tr>
        <tr>
          <td> Releaase Year</td>
          <td> {{$film->releaseYear}}</td>
        </tr>
        <tr>
            <td>Price</td>
            <td> {{'N'.$film->price.'.00'}}</td>
          </tr>
      </tbody>
    </table>
    </p>
    </div>
    <div style="display:inline">
    @include('inc.payment')
    <button class="btn btn-primary  reviewbtn">Write Review</button>
    </div>
    <div>
    <form class="form">

@if(Auth::check())


    <div class="form-group">
    <input type="hidden" value={{$film->id}} name="film_id">
    <textarea rows="3"  class="form-control" name="review" placeholder="write your review" maxLength="170"></textarea>
    </div>
    <div class="form-group">
    <button class="btn btn-sm btn-primary send_review_btn"> Send</button>
    </div>
    </form>
    </div>

    @else
<div class="form-group">
<a href="/login" class="btn btn-lg btn-danger" style="margin-left:50%" >Sign-In</a>
</div>

@endif
<hr/>

<div class="reviewPanel">


</div>


<div class="col-md-3"></div>
</div>
</div>
@endsection
