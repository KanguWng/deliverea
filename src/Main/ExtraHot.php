<?php

namespace Deliverea\CoffeeMachine\Main;

final class ExtraHot
{
    private $extraHot;

    public function __construct (bool $extraHot) {
        $this->extraHot = $extraHot;
    }

    public function isExtraHot() {
        return $this->extraHot;
    }
}