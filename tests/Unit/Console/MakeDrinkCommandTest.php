<?php

namespace Deliverea\CoffeeMachine\Tests\Unit\Console;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use Deliverea\CoffeeMachine\Console\MakeDrinkCommand;

class MakeDrinkCommandTest extends TestCase
{
    private $application;

    protected function setUp(): void
    {
        parent::setUp();
        $this->application = new Application();
        $this->application->add(new MakeDrinkCommand());
    }

    public function testOrderTeaSuccessfully(): void
    {
        $command = $this->application->find('app:order-drink');
        $commandTester = new CommandTester($command);

        $commandTester->execute([
            'drink-type' => 'tea',
            'money' => '0.5',
            'sugars' => 1
        ]);

        $output = $commandTester->getDisplay();
        $this->assertStringContainsString('You have ordered a tea with 1 sugars (stick included)', $output);
    }

    public function testOrderCoffeeSuccessfully(): void
    {
        $command = $this->application->find('app:order-drink');
        $commandTester = new CommandTester($command);

        $commandTester->execute([
            'drink-type' => 'coffee',
            'money' => '0.5',
            'sugars' => 2,
            '--extra-hot' => true
        ]);

        $output = $commandTester->getDisplay();
        $this->assertStringContainsString('You have ordered a coffee extra hot with 2 sugars (stick included)', $output);
    }

    public function testInvalidDrinkShowsError(): void
    {
        $command = $this->application->find('app:order-drink');
        $commandTester = new CommandTester($command);

        $commandTester->execute([
            'drink-type' => 'juice', // inválido
            'money' => '1'
        ]);

        $output = $commandTester->getDisplay();
        $this->assertStringContainsString('The drink type should be tea,coffee,chocolate.', $output);
    }

    public function testInsufficientMoneyShowsError(): void
    {
        $command = $this->application->find('app:order-drink');
        $commandTester = new CommandTester($command);

        $commandTester->execute([
            'drink-type' => 'chocolate',
            'money' => '0.2' // insuficiente
        ]);

        $output = $commandTester->getDisplay();
        $this->assertStringContainsString('The chocolate costs 0.6.', $output);
    }
}

