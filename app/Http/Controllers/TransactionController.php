<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.user.serviceupgrade.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.user.serviceupgrade.checkout');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $transactionid = "MCW-".mt_rand(0, 9999999999);
        $request->request->add(['name' => 'Paket Premium', 'price' => '500000']);
        $transaction = Transaction::create([
            'id'            => $transactionid,
            'user_id'       => Auth::user()->id,
            'name'          => $request->name,
            'price'         => $request->price,
            'total_price'   => $request->price,
            'status'        => 'Unpaid',
        ]);

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id'      => $transaction->id,
                'gross_amount'  => $transaction->total_price,
            ),
            'customer_details' => array(
                'first_name'    => Auth::user()->name,
                'email'         => Auth::user()->email,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('dashboard.user.serviceupgrade.checkout', compact(['transaction', 'snapToken']));
    }

    /**
     * Display the specified resource.
     */
    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash('sha512', $request->order_id.$request->status_code.$request->gross_amount.$serverKey);

        if($hashed == $request->signature_key){
            if($request->transaction_status == "capture"){
                $transaction = Transaction::find($request->order_id);
                $transaction->update(['status' => 'Paid']);
                User::where('id', Auth::user()->id)->update(['premium_status' => 1]);
            }
        }
    }
}
