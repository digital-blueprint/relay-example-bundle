<?php

declare(strict_types=1);

namespace Dbp\Relay\ExampleBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * This is an example command.
 * You can execute it with "php bin/console dbp:my-custom-command my-argument".
 * Change "my-custom-command" to a more meaningful name in $defaultName.
 */
class TestCommand extends Command
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->setName('dbp:my-custom-command');
        $this->addArgument('argument', InputArgument::REQUIRED, 'Example.');
        $this->setDescription('Hey there!');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $argument = $input->getArgument('argument');
        $output->writeln($argument);

        return 0;
    }
}
