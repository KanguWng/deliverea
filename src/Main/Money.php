<?php

namespace Deliverea\CoffeeMachine\Main;

final class Money
{
    private $money;

    //Hacemos un constructor que valide que el dinero es un número positivo
    public function __construct (float $money) {
        if ($money < 0){
            throw new \InvalidArgumentException('The money should be a positive number.');
        }
        $this->money = $money;
    }

    public function getMoney() {
        return $this->money;
    }

    //Hacemos un método que valide si el dinero es suficiente para comprar la bebida, si no lo es lanzamos una excepción
    public function isEnough (string $drinkType,float $price) {
        if ($this->money < $price) {
            throw new \InvalidArgumentException('The ' . $drinkType . ' costs ' . $price . '.'); 
        }
        return true;
    }
}