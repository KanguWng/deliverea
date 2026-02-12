<?php

namespace Deliverea\CoffeeMachine\Main;

use Deliverea\CoffeeMachine\Main\DrinkType; 
use Deliverea\CoffeeMachine\Main\Sugar; 
use Deliverea\CoffeeMachine\Main\Money; 
use Deliverea\CoffeeMachine\Main\ExtraHot;

final class Ticket
{
    private $drinkType;
    private $sugar;
    private $money;
    private $extraHot;

    public function __construct (DrinkType $drinkType, Sugar $sugar, Money $money, ExtraHot $extraHot) {
        $this->drinkType = $drinkType; 
        $this->sugar = $sugar; 
        $this->money = $money; 
        $this->extraHot = $extraHot; 
    }

    public function getDrinkType() { 
        return $this->drinkType; 
    } 
    
    public function getSugar() { 
        return $this->sugar; 
    } 
    
    public function getMoney() {
        return $this->money; 
    } 
    
    public function isExtraHot() {
        return $this->extraHot; 
    }

    public function toString() {
        $message = 'You have ordered a ' . $this->drinkType->getName(); 

        if ($this->extraHot->isExtraHot()) { 
            $message .= ' extra hot'; 
        } 
        
        if ($this->sugar->getSugar() > 0) { 
            $message .= ' with ' . $this->sugar->getSugar() . ' sugars'; 

            if ($this->sugar->hasStick()) { 
                $message .= ' (stick included)'; 
            } 
        }

        return $message;
    }
}