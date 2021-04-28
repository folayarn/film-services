@extends('admin.layouts.app')

@section('content')
<div class="container section">
<div class="row history">
<div class="col-md-3">

    <ul>
<li><a href="/admin/create"> Add films Data</a></li>
<li><a href="/admin/pagination"> Filter Data</a></li>
</ul>


</div>
<div class="col-md-9">
@yield('section')

</div>


</div>








</div>
@endsection
