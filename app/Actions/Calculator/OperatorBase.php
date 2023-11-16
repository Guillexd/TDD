<?php

namespace App\Actions\Calculator;
use App\Actions\Calculator\OperatorInterface;
abstract class OperatorBase implements OperatorInterface {

    protected $operator;
    public function __construct(OperatorInterface $operator)
    {
        $this->operator = $operator;
    }

    public function doOperation(int | float $param1, int | float $param2)
    {
        return $this->operator->doOperation($param1, $param2);
    }
}
