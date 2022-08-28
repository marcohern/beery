<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CreditCardForm extends Component
{
    public $payment;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($payment)
    {
        $this->payment = $payment;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('forty.components.credit-card-form');
    }
}
