<?php

namespace Tests\Helpers;

use Illuminate\Support\Collection;
use PHPUnit\Framework\TestCase;
use stdClass;

class OrderExTestHelper
{
    /***
     * Build a form
     */
    public function buildOrderExFormData(): stdClass
    {
        $form = new stdClass();
        $form->name = 'Brad Pitt';
        $form->phone = '555 555 5555';
        $form->email = 'bpitt@mail.com';
        $form->comments = 'Lorem Ipsum dolor sit amet.';

        $form->address1 = 'Cra 12 #34-56';
        $form->address2 = 'Apt 123';
        $form->zone = 'Los Santos';
        $form->zip = '050099';
        $form->city = 'Medellin';
        $form->state = 'Antioquia';
        $form->country = 'Colombia';

        $form->details = [
            'pale'  => ['qty'=>1, 'subtotal'=>'8000' ],
            'rusty' => ['qty'=>2, 'subtotal'=>'16000'],
            'dark'  => ['qty'=>3, 'subtotal'=>'24000'],
        ];
        $form->total = '48000';
        return $form;
    }
}
