<?php

namespace App\Actions\Calculator;
use App\Actions\Calculator\OperatorInterface;
class Calculator implements OperatorInterface {
    public function doOperation(int | float $param1, int | float $param2)
    {
        return $param1;
    }
}
