<?php

namespace App\Actions\Calculator;
use App\Actions\Calculator\OperatorBase;

class GetLogarithmOperator extends OperatorBase {
    public function doOperation(int | float $param1, int | float $param2)
    {
        return log($param2, parent::doOperation($param1, $param2));
    }
}
