<?php

namespace Deliverea\CoffeeMachine\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use Deliverea\CoffeeMachine\Main\DrinkType;
use Deliverea\CoffeeMachine\Main\Sugar;
use Deliverea\CoffeeMachine\Main\Money;
use Deliverea\CoffeeMachine\Main\ExtraHot;
use Deliverea\CoffeeMachine\Main\Ticket;


class MakeDrinkCommand extends Command
{
    protected static $defaultName = 'app:order-drink';

    protected function configure()
    {
        $this->addArgument(
            'drink-type',
            InputArgument::REQUIRED,
            'The type of the drink. (Tea, Coffee or Chocolate)'
        );

        $this->addArgument(
            'money',
            InputArgument::REQUIRED,
            'The amount of money given by the user'
        );

        $this->addArgument(
            'sugars',
            InputArgument::OPTIONAL,
            'The number of sugars you want. (0, 1, 2)',
            0
        );

        $this->addOption(
            'extra-hot',
            'e',
            InputOption::VALUE_NONE,
            $description = 'If the user wants to make the drink extra hot'
        );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $drinkType = strtolower($input->getArgument('drink-type'));
        $money = $input->getArgument('money');
        $sugars = $input->getArgument('sugars');
        $extraHot = $input->getOption('extra-hot');

        try {
            $drink = new DrinkType($drinkType);
            $amountSugar = new Sugar($sugars);
            $moneyGiven = new Money($money);

            $moneyGiven->isEnough($drink->getName(), $drink->getPrice());

            $command = new Ticket($drink, $amountSugar, $moneyGiven, new ExtraHot($extraHot));
            $output->writeln($command->toString());
        } catch (\InvalidArgumentException $e) { 
            $output->writeln($e->getMessage());
        }
    }
}
