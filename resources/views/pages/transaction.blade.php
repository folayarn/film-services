@extends('layouts.app')


@section('content')
<div class="row history">
<div class="col-md-1"></div>
<div class="col-md-10">


    @if (count($transaction)>0)
    <table class="table table-striped table-dark">
        <thead>
          <tr>
            <th scope="col">TransactionID</th>
            <th scope="col">OrderID</th>
            <th scope="col">FilmID</th>
            <th scope="col">PaymentID</th>
            <th scope="col">Email</th>
            <th scope="col">Amount(N)</th>
            <th scope="col">fees</th>
            <th scope="col">Status</th>
            <th scope="col">PaidAT</th>

          </tr>
        </thead>
        <tbody>
 @foreach ($transaction as $value )

 <tr>
    <th scope="row">{{ $value->id }}</th>
    <td>{{ $value->order_id }}</td>
    <td>{{ $value->film_id }}</td>
    <td>{{ $value->payment_id }}</td>
    <td>{{ $value->email }}</td>
    <td>{{ $value->amount }}</td>
    <td>{{ $value->fees }}</td>
    <td>{{ $value->status }}</td>
    <td>{{ $value->created_at->diffForHumans() }}</td>





  </tr>


 @endforeach




</tbody>
</table>
    @else

    <h3>No transaction yet</h3>
    @endif


</div>
<div class="col-md-1"></div>

</div>



@endsection
