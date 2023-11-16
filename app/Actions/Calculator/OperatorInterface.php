<?php

namespace App\Actions\Calculator;
interface OperatorInterface {
    public function doOperation(int | float $param1, int | float $param2);
}
