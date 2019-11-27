<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('commission_fee', 10, 2);
            $table->decimal('requested_amount', 10, 2);
            $table->decimal('total_balance', 10, 2);
            $table->string('currency', 4);
            $table->string('type', 10);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });

        DB::table('transactions')->insert(
            array(
                'id' => 1,
                'commission_fee' => '0.00',
                'requested_amount' => '0.00',
                'total_balance' => '50.00',
                'currency' => 'usd',
                'type' => 'deposit',
            )
        );

    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
