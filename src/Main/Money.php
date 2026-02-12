<?php

namespace Deliverea\CoffeeMachine\Main\Money;

final class Money
{
    //Definimos el número de azúcares y si se necesita o no un palito
    private float $money;

    //Hacemos un constructor que valide el número de azúcares y asigne si se necesita o no un palito
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
            throw new \InvalidArgumentException('The ' . $drinkType . ' costs ' . $price . '.'); }
        }
        return true;
}