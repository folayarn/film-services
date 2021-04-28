@extends('admin.home')

@section('section')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
@endif
 <div class="alert"></div>
<div class="row">
    <div class="col-md-2">


    </div>
    <div class="col-md-8">


@include('admin.pages.edit.add_film')
    </div>
    <div class="col-md-2">


    </div>


</div>

@endsection

