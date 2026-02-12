<?php

namespace Deliverea\CoffeeMachine\Main;

final class Sugar
{
    //Definimos el número de azúcares y si se necesita o no un palito
    private int $sugar;
    private bool $stick;

    //Hacemos un constructor que valide el número de azúcares y asigne si se necesita o no un palito
    public function __construct (int $sugar) {
        if ($sugar < 0 || $sugar > 2){
            throw new \InvalidArgumentException('The number of sugars should be between 0 and 2.');
        }
        $this->sugar = $sugar;
        $this->stick = $sugar >= 1; 
    }

    public function getSugar() {
        return $this->sugar;
    }

    public function hasStick() { 
        return $this->stick; 
    }
}