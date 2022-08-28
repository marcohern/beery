<?php 

namespace App\Interpreters;

use App\Models\OrderEx;
use Illuminate\Database\Eloquent\Model;
use stdClass;

class CreditCardInfoInterpreter
{
    public function fromForm($input): stdClass
    {
        $ccinfo = new stdClass();

        $ccinfo->ccName = $input['cc-name'];

        dd($ccinfo);
        return $ccinfo;
    }
}
