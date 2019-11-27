<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class DepositTest extends TestCase
{
    use WithFaker, WithoutMiddleware;

    /**
     * We test without Middleware to avoid CSRF token mismatch.
     * Should return a redirect since the deposit method returns a redirect to '/'
     *
     * If we get 302 then the method works and we get back to index
     */
    public function testDeposit(){
        $response = $this->withHeaders([
            'X-CSRF-TOKEN' => csrf_token(),
        ])->post(route("submit_deposit"), [
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
