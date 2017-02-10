<?php
namespace AppBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class HelloCommand
 * @author Yann Le Scouarnec <yann.le-scouarnec@hetic.net>
 * @package AppBundle\Command
 */
class HelloCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('app:hello')
            ->setDescription('Hello, is it me you\'re looking for.')
            ->setHelp("Help.")
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('<error>HELLO!!!!</error>');
    }
}