<?php

namespace App\Http\Controllers;

use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayPalController extends Controller
{
    public function payment(){
        if(!in_array(request()->price, [5, 10, 20, 35, 50, 100]))
            return back()->with('message', 'Please choose a valid value');

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => url("/payment/success"),
                "cancel_url" => url("/payment/cancel")
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "EUR",
                        "value" => request()->price,
                    ]
                ]
            ]
        ]);

        if(isset($response['id']) && $response['id'] != 'null'){
            foreach($response['links'] as $link){
                if($link['rel'] === 'approve' ){
                    return redirect()->away($link['href']);
                }
            }
        } else {
            return redirect("/payment/cancel")->with('message', 'payment failed');
        }
    }

    public function success(){
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->capturePaymentOrder(request()->token);    
        
        if(isset($response['status']) && $response['status'] == "COMPLETED")
            return "Payment successful";
        else 
            return redirect("/payment/cancel")->with('message', 'payment failed');
    }

    public function cancel(){
        return "payment canceled";
    }
}