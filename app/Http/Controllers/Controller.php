<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['balance'] = Transaction::get_latest_total('usd');
        $data['currency'] = 'usd';
        $data['title'] = 'Wallet';

        return view('index')->with($data);
    }

    /**
     * @param Request $request
     * @return string
     */
    public function change_currency(Request $request){
        $data['balance'] = Transaction::get_latest_total($request->get('currency'));
        $data['currency'] = $request->get('currency');

        return json_encode($data);
    }

//    public function transactions()
//    {
//        $data['transactions'] = DB::table('transactions')
//            ->orderByDesc('created_at')
//            ->get();
//        $data['title'] = "Wallet - List Transactions";
//        return view('transactions')->with($data);
//    }


}
