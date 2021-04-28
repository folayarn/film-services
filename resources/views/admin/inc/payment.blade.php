<form method="POST" action="{{ route('pay') }}" class="pull-left" >


            <input type="hidden" name="email" value="{{Auth::user()->email}}">
            <input type="hidden" name="orderID" value="234">
            <input type="hidden" name="amount" value="{{ $film->price.'00'}}">
            <input type="hidden" name="quantity" value="1">
            <input type="hidden" name="currency" value="NGN">
            <input type="hidden" name="metadata" value="{{ json_encode($array = ['film_id' => $film->id]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
            <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}">
                      {{ csrf_field() }}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button class="btn btn-success" type="submit" value="Pay Now!">
                    <i class="fa fa-plus-circle"></i> Pay Now!
                </button>
</form>
