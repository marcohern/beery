<?php

namespace Tests\Unit\DataAccess;

use App\DataAccess\OrderExDal;
use PHPUnit\Framework\TestCase;

class OrderExDalTests extends TestCase
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

        $dal = new OrderExDal();
        $order = $dal->fromForm($input);

        $this->assertEquals($order->total, $order->total);
        $this->assertEquals($order->invoice, false);
        $this->assertNull($order->effective_date);
        $this->assertEquals($order->total_price, 48000);
        $this->assertEquals($order->name, 'Bradd Pitt');
        $this->assertEquals($order->phone, '555 555 5555');
        $this->assertEquals($order->email, 'bpitt@mail.com');
        $this->assertEquals($order->comments, 'Lorem Ipsum dolor sit amet.');
    }

    public function test_makeEffective() {
        $input = $this->buildOrderFormData();

        $dal = new OrderExDal();
        $order = $dal->fromForm($input);
        
        $dal->makeEffective($order);

        $this->assertEquals($order->invoice, true);
        $this->assertNotNull($order->effective_date);
    }
}
