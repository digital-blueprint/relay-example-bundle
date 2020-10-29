<?php

declare(strict_types=1);

namespace DBP\API\StarterBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestCommand extends Command
{
    protected static $defaultName = 'dbp:my-custom-command';

    public function __construct()
    {
        parent::__construct();
    }

    protected function configure()
    {
        $this->addArgument('argument', InputArgument::REQUIRED, 'Example.');
        $this->setDescription('Hey there!');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $argument = $input->getArgument('argument');
        $output->writeln($argument);

        return 0;
    }
}
