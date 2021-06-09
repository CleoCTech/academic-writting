<?php

namespace App\Http\Controllers;

use App\Models\OrderBilling;
use App\Models\Payment;
use Stripe;
use Illuminate\Http\Request;

class StripePaymentController extends Controller
{
    public function store(Request $request)
    {

        session()->forget('payment');
        Stripe\Stripe::setApiKey('sk_test_51HnQaRLEkRDa8FVJlwhauHshEwp83drMgxic6cl6LkPJDxDT16nKlFNJ6f2QJwXYGEDuhNvLUD5YHin3iPe0W34900A9yOZ0wz');
        Stripe\Charge::create([
            "amount"=>round($request->input('grandTotal')*100),
            "currency"=>"usd",
            // "currency"=>env('STRIPE_CURRENCY'),
            "source"=>$request->stripeToken,
            "description"=>$request->name

        ]);
        Payment::create([
            'client_id'=> $request->input('client_Id'),
            'amount'=> $request->input('grandTotal'),
            'currency'=>'usd',
        ]);
        $currentPayment = OrderBilling::where('id', session()->get('billId'))->first();
        OrderBilling::where('id', session()->get('billId'))
                    ->update(['paid_amount' => $request->input('grandTotal') + $currentPayment->paid_amount]);

        session()->put('payment', 'Done');
        $request->session()->flash('success', 'Payment Submited Successfully');
        return back();
    }
}
