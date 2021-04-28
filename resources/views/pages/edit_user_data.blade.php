@extends('layouts.app')

@section('content')

@if ($message = Session::get('Success'))
<div class="alert alert-success"  role="alert" >

      {{ $message }}

</div>
@endif
@if ($message = Session::get('error'))
<div class="alert alert-danger"  role="alert" >

      {{ $message }}

</div>
@endif
<div class="row history">

    <div class="col-md-6">
        @include('inc.editusers.details')
        </div>


    </div>

<div class="col-md-6">

    @include('inc.editusers.password')


</div>


</div>


@endsection
