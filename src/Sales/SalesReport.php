<?php

namespace Deliverea\CoffeeMachine\Sales;

use Deliverea\CoffeeMachine\Sales\Sales;

class SalesReport
{
    private $sales;

    public function __construct(Sales $sales)
    {
        $this->sales = $sales;
    }

    public function toString(): string
    {
        $output = "Total sales for each drink type:" . PHP_EOL;

        foreach ($this->sales->getSales() as $drink => $amount) {
            $output .= $drink . ': ' . $amount . '€' . PHP_EOL;
        }

        $output .= "Total sales amount: " . $this->sales->getTotalSales() . "€";

        return $output;
    }
}
