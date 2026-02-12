<?php

namespace Deliverea\CoffeeMachine\Main\DrinkType;

final class DrinkType
{
    //Definimos los tipos de bebidas y sus precios en un array constante
    private const DRINK_AND_PRICE = [
        'tea' => 0.4,
        'coffee' => 0.5,
        'chocolate' => 0.6,
    ];

    private string $drinkType;

    //Hacemos un constructor privado para evitar que se creen instancias de esta clase desde fuera
    private function __construct(string $drinkType) {
        $drinkType = strtolower($drinkType);
        
        //Confirmamos que el tipo de bebida es válido, si no lo es lanzamos una excepción
        if(!array_key_exists($drinkType, self::DRINK_AND_PRICE)) {
            throw new \InvalidArgumentException('The drink type should be ' . implode(',', array_keys(self::DRINK_AND_PRICE)) . '.');
        }

        $this->drinkType = $drinkType;
    }

    public function getPrice() {
        return self::DRINK_AND_PRICE[$this->drinkType];
    }

    public function getName() { 
        return $this->drinkType;
    }

}
