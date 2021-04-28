@extends('layouts.app')

@section('content')

<div class="container con">

<div class="col-md-12" >
<div class="row">
@if(count($film) >0)

@foreach($film as $key => $value)

<div class="card col-md-4 car">
  <img  src="{{$value->image}}" loading="lazy" class="card-img-top">
  <div class="card-body">
    <h5 class="card-title">{{$value->title}}</h5>
    <p class="card-text">
    <table class="table table-light">
      <tbody>
        <tr>
          <td> Movie Length</td>
          <td> {{$value->movieLength}}</td>
        </tr>

        <tr>
          <td>Genre</td>
          <td> @foreach($value->genres as $k => $val)

            {{$val->name}}
          @endforeach</td>
        </tr>
        <tr>
          <td> Directors</td>
          <td> {{$value->director->name}}</td>
        </tr>
        <tr>
            <td>Price</td>
            <td> {{'N'.$value->price.'.00'}}</td>
          </tr>
        <tr>
          <td> Releaase Year</td>
          <td> {{$value->releaseYear}}</td>
        </tr>
      </tbody>
    </table>
    </p>
    <a href="/show/{{$value->id}}" class="btn btn-primary">Purchase</a>
    </div>
  </div>


@endforeach


@else

<h4> No film data</h4>
@endif



</div>
<div class="col-md-2"></div>

</div>


@endsection
