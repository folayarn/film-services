@extends('admin.home')

@section('section')
@if ($message = Session::get('success'))
<div class="alert alert-success"  role="alert" >

      {{ $message }}

</div>
@endif
 <div class="alert"></div>
<div class="row">
    <div class="col-md-5">

@include('admin.pages.add_director')
@include('admin.pages.add_genre')

    </div>
    <div class="col-md-7">


@include('admin.pages.add_film')
    </div>



</div>

@endsection

