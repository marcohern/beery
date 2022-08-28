<?php 

namespace App\DataAccess;

use Illuminate\Database\Eloquent\Model;

interface IInterpreter
{
    public function fromForm(Collection $input): Model;
}
