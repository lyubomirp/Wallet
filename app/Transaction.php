<?php

namespace App;

use App\Http\Requests\DepositRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $fillable = [
        'requested_amount',
        'total_balance',
        'commission_fee',
        'currency',
        'type'
    ];


    public static function withdraw(DepositRequest $request){
        $fee = $request->input('commission_fee');
        $requested = $request->input('requested_amount');
        $currency = $request->input('currency');
        $type = 'withdraw';

        $previous_balance = self::get_latest_total($currency);

        if ($previous_balance < $requested + $fee) {
            throw new \ArithmeticError('Your deposited funds are too low');
        }

        Transaction::create([
            'commission_fee' => $fee,
            'requested_amount' => $requested,
            'total_balance' => $previous_balance - ($requested + $fee),
            'currency' => $currency,
            'type' => $type,
        ]);

    }

    public static function deposit(DepositRequest $request){
        $fee = $request->input('commission_fee');
        $requested = $request->input('requested_amount');
        $currency = $request->input('currency');
        $type = 'deposit';

        $previous_balance = self::get_latest_total($currency);

        Transaction::create([
            'commission_fee' => $fee,
            'requested_amount' => $requested,
            'total_balance' => $previous_balance + $requested - $fee,
            'currency' => $currency,
            'type' => $type,
        ]);
    }

    public static function get_latest_total($currency){
        $previous_balance = DB::table('transactions')
            ->where('currency', '=', $currency)
            ->latest('created_at')
            ->first();

        if (!$previous_balance) {
            $previous_balance = 0;
        } else {
            $previous_balance = $previous_balance->total_balance;
        }

        return $previous_balance;
    }
}
