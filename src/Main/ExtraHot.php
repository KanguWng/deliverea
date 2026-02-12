<?php

namespace Deliverea\CoffeeMachine\Main\ExtraHot;

final class ExtraHot
{
    //Definimos el número de azúcares y si se necesita o no un palito
    private bool $extraHot;;

    //Hacemos un constructor que valide el número de azúcares y asigne si se necesita o no un palito
    public function __construct (bool $extraHot) {
        $this->extraHot = $extraHot;
    }

    public function isExtraHot() {
        return $this->extraHot;
    }
}