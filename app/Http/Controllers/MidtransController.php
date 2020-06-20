<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Midtrans\ApiRequestor;
use App\Http\Controllers\Midtrans\Config;
use App\Http\Controllers\Midtrans\CoreApi;
use App\Http\Controllers\Midtrans\Notification;
use App\Http\Controllers\Midtrans\Sanitizer;
use App\Http\Controllers\Midtrans\Snap;
use App\Http\Controllers\Midtrans\SnapApiRequestor;
use App\Http\Controllers\Midtrans\Transaction;
use App\Pembayaran;
use Illuminate\Http\Request;

class MidtransController extends Controller
{
    public function getSnapToken(Request $r){

        $item_list = array();
        $amount = 0;
        Config::$serverKey = env('MIDTRANS_SERVER_KEY', 'SB-Mid-server-nhB9RzzD6lwS2aZLCWCOf9Ib');

        if (!isset(Config::$serverKey)) {
            return "Server key is invalid";
        }

        Config::$isSanitized = true;

        // Enable 3D-Secure
        Config::$is3ds = true;
        
        // Required
        // Kayaknya itemnya harus bisa lebih dari satu

    foreach($r->item_id as $key=>$item){
        array_push($item_list, [
                'id' => $r->item_id[$key],
                'price' => $r->item_price[$key],
                'quantity' => $r->item_quantity[$key],
                'name' => $r->item_name[$key]
         
        ]);
    }

        $transaction_details = array(
            'order_id' => $this->getOrderId(),
            // 'order_id' => rand(),
            'gross_amount' => 0, // no decimal allowed for creditcard
        );


        // Optional
        $item_details = $item_list;

        // Optional
        $billing_address = array(
            'first_name'    => $r->billing_first_name,
            // 'last_name'     => $r->billing_last_name,
            'address'       => $r->billing_address,
            'city'          => $r->billing_city,
            'postal_code'   => $r->billing_postal_code,
            'phone'         => $r->billing_phone,
            'country_code'  => $r->billing_country_code
        );

        // Optional
        // Gak usah
        $shipping_address = array(
            'first_name'    => "Obet",
            'last_name'     => "Supriadi",
            'address'       => "Manggis 90",
            'city'          => "Jakarta",
            'postal_code'   => "16601",
            'phone'         => "08113366345",
            'country_code'  => 'IDN'
        );

        // Optional
        $customer_details = array(
            'first_name'    => $r->cust_name,
            // 'last_name'     => $r->customer_last_name,
            'email'         => $r->cust_email,
            'phone'         => $r->cust_phone,
            'billing_address'  => $billing_address,
            // 'shipping_address' => $shipping_address
        );

        // Optional, remove this to display all available payment methods
        $enable_payments = [];

        // Fill transaction details
        $transaction = array(
            'enabled_payments' => $enable_payments,
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details,
            'item_details' => $item_details,
        );
        // return $transaction;
        try {
            $snapToken = Snap::getSnapToken($transaction);
            // $this->storeDetailPembayaran
            return response()->json($snapToken);
            // return ['code' => 1 , 'message' => 'success' , 'result' => $snapToken];
        } catch (\Exception $e) {
            // dd($e);
            return ['code' => 0 , 'message' => 'failed'];
        }

    }

    public function storeDetailPembayaran(Request $r)
    {
        //Untuk memasukkan data ke dalam database easy private
    }

    public function getOrderId()
    {
        $pembayaran = Pembayaran::orderBy('id_pembayaran','desc')->first();
        if($pembayaran!=null){
            return $pembayaran->id_pembayaran+1;
        }
        else{
            return 1;
        }
    }
}
