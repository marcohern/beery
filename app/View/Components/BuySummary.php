<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BuySummary extends Component
{
    public $order;
    public $details;
    public $flavors;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($order, $details, $flavors)
    {
        $this->order = $order;
        $this->details = $details;
        $this->flavors = $flavors;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('forty.components.buy-summary');
    }
}
