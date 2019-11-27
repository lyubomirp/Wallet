<?php

namespace Tests\Unit;

use App\Transaction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DatabaseTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * 100 new entries are made by using the TransactionFactory
     *
     * It's basically to test if our database restrictions work as intended
     *
     * @return void
     */
    public function testExample()
    {
        $transaction = factory(Transaction::class, 100)->create();
        $collection = Transaction::all();
        foreach ($collection as $item){
            $this->assertDatabaseHas('transactions', [
                'commission_fee' => $item->commission_fee,
                'requested_amount' => $item->requested_amount,
                'total_balance' => $item->total_balance,
                'currency' => $item->currency,
                'type' => $item->type,
                'created_at'=>$item->created_at,
                'updated_at' => $item->updated_at
            ]);
        }
    }
}
