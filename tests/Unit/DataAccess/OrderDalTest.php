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
        $input->total = 48000;
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
        $order = $dal->fromForm($input);

        $this->assertEquals($order->total, $order->total);
        $this->assertEquals($order->user_id, 1);
        $this->assertEquals($order->invoice, false);
        $this->assertNull($order->effective_date);
        $this->assertEquals($order->total_price, 48000);
    }

    public function test_detailsFromForm()
    {
        $input = $this->buildOrderFormData();

        $dal = new OrderDal();
        $pale  = $dal->detailsFromForm('pale' , $input->details['pale' ]);
        $rusty = $dal->detailsFromForm('rusty', $input->details['rusty']);
        $dark  = $dal->detailsFromForm('dark' , $input->details['dark' ]);

        $this->assertEquals($pale->qty , 1);
        $this->assertEquals($pale->unit_price , 8000);
        $this->assertEquals($rusty->qty, 2);
        $this->assertEquals($rusty->unit_price, 8000);
        $this->assertEquals($dark->qty , 3);
        $this->assertEquals($dark->unit_price , 8000);
    }
}
