<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepositRequest;
use App\Transaction;

class DepositController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function deposit()
    {
        $data['title'] = 'Wallet - Deposit';
        $data['commission_rate'] = 0.0003;
        $data['max_commission'] = 5;
        $data['result'] = json_decode(file_get_contents('https://api.exchangeratesapi.io/latest?base=EUR&symbols=USD,GBP'), true);
        return view('deposit')->with($data);
    }

    /**
     * @param DepositRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function post_deposit(DepositRequest $request)
    {
        Transaction::deposit($request);
        return redirect('/')->with('success', 'Your deposit was successful');
    }
}
