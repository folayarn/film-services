@extends('layouts.app')


@section('content')
<div class="row history">
<div class="col-md-1"></div>
<div class="col-md-10">


    @if (count($order)>0)
    <table class="table table-striped table-dark">
        <thead>
          <tr>
            <th scope="col">OrderID</th>
            <th scope="col">OrderOnwer</th>
            <th scope="col">Amount(N)</th>
            <th scope="col">Film</th>

            <th scope="col">Payment Status</th>
            <th scope="col">Created</th>


          </tr>
        </thead>
        <tbody>
 @foreach ($order as $value )

 <tr>
    <th scope="row">{{ $value->id }}</th>
    <td>{{ $value->user->name }}</td>
    <td>{{ $value->film->price }}</td>
    <td>{{ $value->film->title }}</td>
    <td>@if($value->isPaid == true)

<span style='color:green'> Transaction Successful</span>
@else


<span style='color:red'>Transaction Failed</span>

@endif
</td>

    <td>{{ $value->created_at->diffForHumans() }}</td>





  </tr>


 @endforeach




</tbody>
</table>
    @else

    <h3>you have not made any order</h3>
    @endif


</div>
<div class="col-md-1"></div>

</div>



@endsection
