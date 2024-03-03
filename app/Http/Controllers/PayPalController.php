<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;

class PayPalController extends Controller
{
    //
    public function payment()
    {
        $data = [];
        $data['items'] = [
            [
                'name' => 'appel',
                'price' => 4.8,
                'description' => 'Hello',
                'quantity' => '4'
            ],
            [
                'name' => 'orange',
                'price' => 3.2,
                'description' => 'Hello',
                'quantity' => '4'

            ],
        ];
        $data['invoice_id'] = 1;
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = 'http://127.0.0.1:8000/payment/success';
        $data['cancel_url'] = 'http://127.0.0.1:8000/cancel';
        $data['total'] = 3000;

        $provider = new ExpressCheckout;
        $response = $provider->setExpressCheckout($data. true);
        return redirect($response['paypal_link']);

    }

    public function cancel()
    {
        return response()->json('Payment Cancelled', 402);
    }

    public function success()
    {
        $provider = new ExpressCheckout;

        $response = $provider->getExpressCheckoutDetails($request->token);
        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            return response()->json('Paid success');
        }
        return response()->json('fail Paid');
    }
}
