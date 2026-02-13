#!/usr/bin/env php
<?php
// application.php

require __DIR__.'/vendor/autoload.php';

use Deliverea\CoffeeMachine\Console\MakeDrinkCommand;
use Symfony\Component\Console\Application;
use Deliverea\CoffeeMachine\Console\SalesReportCommand;
use Deliverea\CoffeeMachine\Sales\Sales;

$application = new Application();

$sales = new Sales();

$application->add(new MakeDrinkCommand());
$application->add(new SalesReportCommand($sales));

$application->run();
