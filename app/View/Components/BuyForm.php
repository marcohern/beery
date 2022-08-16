<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BuyForm extends Component
{
    public $flavors;
    
    public function __construct($flavors)
    {
        $this->flavors = $flavors;
    }
    
    public function render()
    {
        return view('components.forty.buy-form');
    }
}
