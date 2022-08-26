<?php

namespace Tests\Unit\DataAccess;

use App\DataAccess\OrderDal;
use PHPUnit\Framework\TestCase;

class OrderDalTests extends TestCase
{
    private function buildOrderFormData()
    {
        $input = new \stdClass();
        $input->details = [
            'pale'  => ['qty'=>1, 'subtotal'=>8000 ],
            'rusty' => ['qty'=>2, 'subtotal'=>16000],
            'dark'  => ['qty'=>3, 'subtotal'=>24000],
        ];
        $input->total
            = $input->details['pale' ]['subtotal']
            + $input->details['rusty']['subtotal']
            + $input->details['dark' ]['subtotal'];
        $input->name = 'Bradd Pitt';
        $input->phone = '555 555 5555';
        $input->email = 'bpitt@mail.com';
        $input->comments = 'Lorem Ipsum dolor sit amet.';
        return $input;
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_fromForm()
    {
        $input = $this->buildOrderFormData();

        $dal = new OrderDal();
        $user = new User(); $user->id = 1;
        $order = $dal->fromForm($input, $user);

        $this->assertEquals($order->total, $order->total);
        $this->assertEquals($order->user_id, 1);
        $this->assertEquals($order->invoice, false);
        $this->assertNull($order->effective_date);
        $this->assertEquals($order->total_price, 48000);
    }
}
