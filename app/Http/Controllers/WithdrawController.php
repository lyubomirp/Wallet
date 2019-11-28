<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepositRequest;
use App\Transaction;

class WithdrawController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function withdraw()
    {
        $data['title'] = 'Wallet - withdraw';
        $data['commission_rate'] = 0.003;
        $data['min_commission'] = 0.5;
        $data['result'] = json_decode(file_get_contents('https://api.exchangeratesapi.io/latest?base=EUR&symbols=USD,GBP'), true);

        return view('withdraw')->with($data);
    }

    /**
     * @param DepositRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function post_withdraw(DepositRequest $request)
    {
        try{
            Transaction::withdraw($request);
        }catch (\ArithmeticError $error){
            return back()->with('error', $error->getMessage());
        }
        return redirect('/')->with('success', 'Your withdraw was successful');
    }
}
