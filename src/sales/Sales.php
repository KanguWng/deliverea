<?php

namespace Deliverea\CoffeeMachine\Sales;

use Deliverea\CoffeeMachine\Main\DrinkType;

final class Sales
{
    private $sales = [];
    private $file;

    // Inicializamos el array de ventas con 0.0 para cada tipo de bebida
    public function __construct()
    {
        // Archivo JSON en la misma carpeta
        $this->file = __DIR__ . '/sales.json';

        if (file_exists($this->file)) {
            $this->sales = json_decode(file_get_contents($this->file), true);
        } else {
            $this->sales = array_fill_keys(
                array_keys(DrinkType::DRINK_AND_PRICE),
                0.0
            );

            $this->save(); // crea el archivo la primera vez
        }
    }

    public function addSales(string $drinkType, float $amount): void
    {
        if (!array_key_exists($drinkType, $this->sales)) {
            throw new \InvalidArgumentException(
                'The drink type should be ' .
                implode(',', array_keys(DrinkType::DRINK_AND_PRICE)) . '.'
            );
        }

        $this->sales[$drinkType] += $amount;

        // Guardamos después de sumar
        $this->save();
    }

    public function getSales()
    {
        return $this->sales;
    }

    public function getSalesForDrink(string $drinkType): float
    {
        if (!array_key_exists($drinkType, $this->sales)) {
            throw new \InvalidArgumentException(
                'The drink type should be ' .
                implode(',', array_keys(DrinkType::DRINK_AND_PRICE)) . '.'
            );
        }

        return $this->sales[$drinkType];
    }

    public function getTotalSales(): float
    {
        return array_sum($this->sales);
    }

    private function save(): void
    {
        file_put_contents(
            $this->file,
            json_encode($this->sales, JSON_PRETTY_PRINT)
        );
    }
}
