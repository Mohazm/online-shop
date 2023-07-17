<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use DB;

class OrderController extends Controller
{
    public function index()
    {
        return view('order.index');
    }

    public function checkout(Request $request)
    {
        $request->request->add(['total_price' => $request->qty, 'status' => 'unpaid']);
        $order = Order::create($request->all());

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = config('midtrans.is_production');
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $order->id,
                'gross_amount' => $order->total_price,
            ),
            'customer_details' => array(
                'first_name' => $request->name,
                'last_name' => '',
                'phone' => $request->phone,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        
        return view('checkout', compact('snapToken','order'));
    }

    public function callback(Request $request){
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if($hashed ==$request->signature_key){
            if($request->transaction_status == 'capture' or $request->transaction_status == 'capture'){
                $order = Order::find($request->order_id);
                $order->update(['status' => 'paid']);
            }
        }

    }

    public function invoice($id){
        $order = Order::find($id);
        return view('invoice',compact('order'));
    }

    public function form(Request $request){
        //arahkan ke halaman baru dengan menyertakan data kategori(compact)
        //di resources/views/kategori/index.blade.php
        $keyword = $request->get('keyword');
        Paginator::useBootstrap();
        $ar_produk = DB::table('orders') //join tabel dengan Query Builder Laravel
            ->select(
                'orders.*'
            )
            ->where('name', 'like', '%' . $keyword . '%')
            ->orWhere('address', 'like', '%' . $keyword . '%')
            ->orWhere('phone', 'like', '%' . $keyword . '%')
            ->orWhere('total_price', 'like', '%' . $keyword . '%')
            ->orWhere('status', 'like', '%' . $keyword . '%')
            ->paginate(10);
        return view('order.form', compact('ar_produk', 'keyword'));
    }


}
