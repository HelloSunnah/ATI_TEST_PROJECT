<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function showPaymentForm()
    {
        return view('backend.payment.form');
    }

    public function initiatePayment(Request $request)
    {
        $post_data = array(
            'store_id' => env('SSLCommerz_STORE_ID'),
            'store_passwd' => env('SSLCommerz_STORE_PASSWORD'),
            'total_amount' => $request->amount,
            'currency' => 'BDT',
            'tran_id' => uniqid(),
            'success_url' => route('payment.success'),
            'fail_url' => route('payment.fail'),
            'cancel_url' => route('payment.cancel'),
            'cus_name' => $request->name,
            'cus_email' => $request->email,
            'cus_add1' => $request->address,
            'cus_city' => $request->city,
            'cus_country' => 'Bangladesh',
            'cus_phone' => $request->phone,
            'cus_fax' => '',
            'ship_name' => $request->name,
            'ship_add1' => $request->address,
            'ship_city' => $request->city,
            'ship_state' => '',
            'ship_zip' => '',
            'ship_country' => 'Bangladesh',
            'value_a' => '',
            'value_b' => '',
            'value_c' => '',
            'value_d' => ''
        );
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://sandbox.sslcommerz.com/gwprocess/v3/order.php');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
    
        $result = json_decode($response, true);
        if (isset($result['GatewayPageURL'])) {
            return redirect($result['GatewayPageURL']);
            

        } else {
            return back()->withErrors(['error' => 'Payment initiation failed.']);
        }
    }
    

    public function paymentSuccess(Request $request)
    {
        return view('backend.payment.success');
    }

    public function paymentFail(Request $request)
    {
        return view('backend.payment.fail');
    }

    public function paymentCancel(Request $request)
    {
        return view('backend.payment.cancel');
    }
}
