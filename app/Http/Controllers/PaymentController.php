<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;

class PaymentController extends Controller
{
    public function index(){
        return view('payment');
    }

    public function pay(Request $request){
        // Set your secret key: remember to change this to your live secret key in production
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey('sk_test_rHebf4V59f6GnIdUygPMygir00yyXAtxGy');

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $amount=(int)$request->fare_amount*100;
        $token = $_POST['stripeToken'];
        $charge = \Stripe\Charge::create([
            'amount' => $amount,
            'currency' => 'kes',
            'description' => 'Ticket Payment charge',
            'source' => $token,
        ]);

        return redirect('/home')->with('booking','You have paid for the ticket');

    }

    public function confirm(){
        
    }
}
