<?php

namespace Deliverea\CoffeeMachine\Main;

final class Ticket
{
    final DrinkType $drinkType;
    final Sugar $sugar;
    final Money $money;
    final ExtraHot $extraHot;

    public function __construct (DrinkType $drinkType, Sugar $sugar, Money $money, ExtraHot $extraHot) {
        $this->drinkType = $drinkType; 
        $this->sugar = $sugar; 
        $this->money = $money; 
        $this->extraHot = $extraHot; 
    }

    public funtion getDrinkType() { 
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
        $message = 'You have ordered a '$this->drinkType->getName(); 

        if ($this->extraHot->isExtraHot()) { 
            $message .= ' extra hot'; 
        } 
        
        if ($this->sugar->getSugar() > 0) { 
            $message .= ' with ' . $this->sugar->getSugar() . ' sugars'; 

            if ($this->sugar->hasStick()) { 
                $message .= ' (stikck included)'; 
            } 
        }
        
        return $message;
    }
}