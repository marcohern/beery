<?php 

namespace App\Interpreters;

use Illuminate\Database\Eloquent\Model;

interface IInterpreter
{
    public function fromForm($input): Model;
}
