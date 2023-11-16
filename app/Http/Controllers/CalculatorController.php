<?php

namespace App\Http\Controllers;

use App\Actions\Calculator\AddOperator;
use App\Actions\Calculator\DivisionOperator;
use App\Actions\Calculator\GetLogarithmOperator;
use App\Actions\Calculator\GetPowerOperator;
use App\Actions\Calculator\GetRootOperator;
use App\Actions\Calculator\MultiplyOperator;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAddRequest;
use App\Http\Requests\StoreDivideRequest;
use App\Http\Requests\StoreGetLogarithmRequest;
use App\Http\Requests\StoreGetPowerRequest;
use App\Http\Requests\StoreGetRootRequest;
use App\Http\Requests\StoreMultiplyRequest;
use App\Http\Requests\StoreSubtractRequest;
use App\Actions\Calculator\OperatorInterface;
use App\Actions\Calculator\SubtractOperator;
use Guille\ChainBuilder\Calculator as CalculatorChain;

class CalculatorController extends Controller
{
    public $calculator;
    public function __construct(CalculatorChain $calculator)
    {
        $this->calculator = $calculator;
    }

    // public function add(StoreAddRequest $request, AddOperator $addOperator)
    // {
    //     $validated = (object) $request->validated();
    //     $result = $addOperator->doOperation($validated->param1, $validated->param2);
    //     return response()->json(['result' => $result]);
    // }

    public function add(StoreAddRequest $request)
    {
        $validated = (object) $request->validated();
        $result = $this->calculator->add($validated->param1, $validated->param2)->getResult();
        return response()->json(['result' => $result]);
    }

    // public function result(Request $request, AddOperator $addOperator, SubtractOperator $subtractOperator)
    // {
    //     // $validated = (object) $request->validated();
    //     $add = $addOperator->doOperation($request->param1, $request->param2);
    //     $substract = $addOperator->doOperation($request->param3, $request->param4);
    //     $result = $subtractOperator->doOperation($add, $substract);
    //     return response()->json(['result'=> $result]);
    // }

    public function substract(StoreSubtractRequest $request, SubtractOperator $subtractOperator)
    {
        $validated = (object) $request->validated();
        $result = $subtractOperator->doOperation($validated->param1, $validated->param2);
        return response()->json(['result' => $result]);
    }

    public function multiply(StoreMultiplyRequest $request, MultiplyOperator $multiplyOperator)
    {
        $validated = (object) $request->validated();
        $result = $multiplyOperator->doOperation($validated->param1, $validated->param2);
        return response()->json(['result' => $result]);
    }

    public function divide(StoreDivideRequest $request, DivisionOperator $divideOperator)
    {
        $validated = (object) $request->validated();
        $result = $divideOperator->doOperation($validated->param1, $validated->param2);
        return response()->json(['result' => $result]);
    }

    public function getPower(StoreGetPowerRequest $request, GetPowerOperator $powerOperator)
    {
        $validated = (object) $request->validated();
        $result = $powerOperator->doOperation($validated->param1, $validated->param2);
        return response()->json(['result' => $result]);
    }

    public function getRoot(StoreGetRootRequest $request, GetRootOperator $rootOperator)
    {
        $validated = (object) $request->validated();
        $result = $rootOperator->doOperation($validated->param1, $validated->param2);
        return response()->json(['result' => $result]);
    }

    public function getLogarithm(StoreGetLogarithmRequest $request, GetLogarithmOperator $logarithmOperator)
    {
        $validated = (object) $request->validated();
        $result = $logarithmOperator->doOperation($validated->param1, $validated->param2);
        return response()->json(['result' => $result]);
    }
}
