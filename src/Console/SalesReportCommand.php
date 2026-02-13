<?php

namespace Deliverea\CoffeeMachine\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Deliverea\CoffeeMachine\Sales\Sales;
use Deliverea\CoffeeMachine\Sales\SalesReport;

class SalesReportCommand extends Command
{
    protected static $defaultName = 'app:sales-report';

    private $sales;

    public function __construct(Sales $sales)
    {
        parent::__construct();
        $this->sales = $sales;
    }

    protected function configure()
    {
        $this->setDescription('Shows the total sales report');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $report = new SalesReport($this->sales);
        $output->writeln($report->toString());
    }
}
