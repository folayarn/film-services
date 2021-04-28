<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Paystack;
use App\Transaction;
use App\Order;
use Exception;

class PaymentController extends Controller
{


    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        try{
            return Paystack::getAuthorizationUrl()->redirectNow();

        }catch(\Exception $e) {
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

       try
       {

$transaction= new Transaction();
$transaction->payment_id=$paymentDetails['data']['id'];
$transaction->status=$paymentDetails['data']['status'];
$transaction->film_id=$paymentDetails['data']['metadata']['film_id'];

$transaction->reference_no=$paymentDetails['data']['reference'];
$transaction->email=$paymentDetails['data']['customer']['email'];
$transaction->message=$paymentDetails['data']['message'];
$transaction->amount=$paymentDetails['data']['amount'];
$transaction->fees=$paymentDetails['data']['fees'];
$transaction->paid_at=$paymentDetails['data']['paid_at'];
$transaction->channel=$paymentDetails['data']['channel'];
$transaction->user_id=auth()->user()->id;
$order=new Order();
$order->user_id=auth()->user()->id;
$order->film_id=$paymentDetails['data']['metadata']['film_id'];
$order->isPaid=true;
$order->save();

$order->transaction()->save($transaction);








     if($paymentDetails['data']['status'] = 'success'){
    return redirect('/success');
     }else{


     }
       }
       catch(Exception $e)
       {
        if($paymentDetails['data']['status'] = 'success'){
            return redirect('/success');
            }else{
               return redirect('/fail');

            }
       }






}
}
