<?php

namespace Tests\Unit\TestHelpers;

use PHPUnit\Framework\TestCase;
use Tests\Helpers\OrderExTestHelper;

class ExampleTest extends TestCase
{

    protected function setUp(): void
    {
        $this->orderExHelper = new OrderExTestHelper();
    }

    
    protected function tearDown(): void
    {
        unset($this->orderExHelper);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_buildOrderExFormData()
    {
        //setup
        $helper = new OrderExTestHelper();

        //act
        $input = $helper->buildOrderExFormData();
        
        //verify
        $this->assertEquals($input->name, 'Brad Pitt');
        $this->assertEquals($input->phone, '555 555 5555');
        $this->assertEquals($input->email, 'bpitt@mail.com');
        $this->assertEquals($input->comments, 'Lorem Ipsum dolor sit amet.');

        $this->assertEquals($input->address1, 'Cra 12 #34-56');
        $this->assertEquals($input->address2, 'Apt 123');
        $this->assertEquals($input->zone, 'Los Santos');
        $this->assertEquals($input->zip, '050099');
        $this->assertEquals($input->city, 'Medellin');
        $this->assertEquals($input->state, 'Antioquia');
        $this->assertEquals($input->country, 'Colombia');
        
        $this->assertEquals($input->details, [
            'pale'  => ['qty'=>1, 'subtotal'=>'8000' ],
            'rusty' => ['qty'=>2, 'subtotal'=>'16000'],
            'dark'  => ['qty'=>3, 'subtotal'=>'24000'],
        ]);
        $this->assertEquals($input->total, '48000');
    }
}
