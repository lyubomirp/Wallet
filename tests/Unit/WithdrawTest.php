<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class WithdrawTest extends TestCase
{
    use WithFaker, WithoutMiddleware;

    /**
     * Logic on the controller is pretty much identical, so the test is the same.
     *
     * Expecting a 302 due to a page redirect on success.
     *
     */
    public function testDeposit(){
        $response = $this->withHeaders([
            'X-CSRF-TOKEN' => csrf_token(),
        ])->post(route("submit_withdraw"), [
            'commission_fee' => $this->faker->randomFloat(2, 0, 10),
            'requested_amount' => $this->faker->randomFloat(2, 0, 10),
            'total_balance' => $this->faker->randomFloat(2, 0, 10),
            'currency' => $this->faker->currencyCode,
            'type' => $this->faker->randomElement(['deposit', 'withdraw']),
            'created_at'=>now(),
            'updated_at' => now()
        ]);

        $response
            ->assertStatus(302);
    }
}
