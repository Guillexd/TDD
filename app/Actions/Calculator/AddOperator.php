<?php

namespace App\Actions\Calculator;
use App\Actions\Calculator\OperatorBase;

class AddOperator extends OperatorBase {
    public function doOperation(int | float $param1, int | float $param2)
    {
        return parent::doOperation($param1, $param2) + $param2;
    }
}
