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
         $item_list[] = [
                'id' => $r->item_id,
                'price' => $r->item_price,
                'quantity' => $r->item_quantity,
                'name' => $r->item_name
        ];

        $transaction_details = array(
            // 'order_id' => $this->getOrderId(),
            'order_id' => rand(),
            'gross_amount' => 20000, // no decimal allowed for creditcard
        );


        // Optional
        $item_details = $item_list;

        // Optional
        $billing_address = array(
            'first_name'    => "Andri",
            'last_name'     => "Litani",
            'address'       => "Mangga 20",
            'city'          => "Jakarta",
            'postal_code'   => "16602",
            'phone'         => "081122334455",
            'country_code'  => 'IDN'
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
            'shipping_address' => $shipping_address
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
            return response()->json($snapToken);
            // return ['code' => 1 , 'message' => 'success' , 'result' => $snapToken];
        } catch (\Exception $e) {
            dd($e);
            return ['code' => 0 , 'message' => 'failed'];
        }

    }

    public function storeDetailPembayaran()
    {
        //Untuk memasukkan data ke dalam database easy private
    }

    public function getOrderId()
    {
        //Untuk mendapatkan id pembayaran dari database easyprivate
    }
}
