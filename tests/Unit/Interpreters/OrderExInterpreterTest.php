<?php

namespace Tests\Unit\Interpreters;

use PHPUnit\Framework\TestCase;
use Tests\Helpers\OrderExTestHelper;

class OrderExInterpreterTest extends TestCase
{
    private $orderExHelper;

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
        $input = $this->orderExHelper->buildOrderExFormData();
        $this->assertTrue(true);
    }
}
