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

        $input->suite = 'Apt 123';
        $input->address = 'Cra 12 #34-56';
        $input->zone = 'Los Santos';
        $input->zip = '050078';
        $input->city = 'Medellin';
        $input->state = 'Antioquia';
        $input->country = 'Colombia';

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
        $this->assertEquals($order->suite, 'Apt 123');
        $this->assertEquals($order->address, 'Cra 12 #34-56');
        $this->assertEquals($order->zone, 'Los Santos');
        $this->assertEquals($order->zip, '050078');
        $this->assertEquals($order->city, 'Medellin');
        $this->assertEquals($order->state, 'Antioquia');
        $this->assertEquals($order->country, 'Colombia');
    }

    public function test_makeEffective()
    {
        $input = $this->buildOrderFormData();

        $dal = new OrderExDal();
        $order = $dal->fromForm($input);
        
        $dal->makeEffective($order);

        $this->assertEquals($order->invoice, true);
        $this->assertNotNull($order->effective_date);
    }
}
