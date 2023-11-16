<?php

namespace App\Providers;

use App\Actions\Calculator\Calculator;
use App\Actions\Calculator\AddOperator;
use App\Actions\Calculator\SubtractOperator;
use App\Actions\Calculator\MultiplyOperator;
use App\Actions\Calculator\DivisionOperator;
use App\Actions\Calculator\GetLogarithmOperator;
use App\Actions\Calculator\GetPowerOperator;
use App\Actions\Calculator\GetRootOperator;
use App\Actions\Calculator\OperatorInterface;
use App\Http\Controllers\CalculatorController;
use Guille\ChainBuilder\CalculatorFactory;
use Guille\ChainBuilder\Calculator as CalculatorChain;
use Guille\ChainBuilder\Methods\Addition;
use Guille\ChainBuilder\Methods\Division;
use Guille\ChainBuilder\Methods\Multiplication;
use Guille\ChainBuilder\Methods\Subtraction;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //$this->app->when(CalculatorController::class)->needs(OperatorInterface::class)->give(Calculator::class);
        $this->app->bind(AddOperator::class, function ($app) {
            return new AddOperator($app->make(Calculator::class));
        });

        $this->app->bind(SubtractOperator::class, function ($app) {
            return new SubtractOperator($app->make(Calculator::class));
        });

        $this->app->bind(MultiplyOperator::class, function ($app) {
            return new MultiplyOperator($app->make(Calculator::class));
        });

        $this->app->bind(DivisionOperator::class, function ($app) {
            return new DivisionOperator($app->make(Calculator::class));
        });

        $this->app->bind(GetPowerOperator::class, function ($app) {
            return new GetPowerOperator($app->make(Calculator::class));
        });

        $this->app->bind(GetRootOperator::class, function ($app) {
            return new GetRootOperator($app->make(Calculator::class));
        });

        $this->app->bind(GetLogarithmOperator::class, function ($app) {
            return new GetLogarithmOperator($app->make(Calculator::class));
        });


        $this->app->bind(CalculatorChain::class, function ($app) {
            CalculatorFactory::addOperation('add', $app->make(Addition::class));
            CalculatorFactory::addOperation('subtract', $app->make(Subtraction::class));
            CalculatorFactory::addOperation('multiply', $app->make(Multiplication::class));
            CalculatorFactory::addOperation('divide', $app->make(Division::class));
            return new CalculatorChain();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
