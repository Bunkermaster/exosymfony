<?php
namespace AppBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

/**
 * Class UselessCommand
 * @author Yann Le Scouarnec <yann.le-scouarnec@hetic.net>
 * @package AppBundle\Command
 */
class UselessCommand extends Command
{

    protected function configure()
    {
        $this
            ->setName('app:helloyou')
            ->setDescription('Application polie.')
            ->setHelp("Cette commande ne sert à rien")
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            '<error>Hellonificator</error>',
            '<error>==============</error>',
            '',
        ]);
        $question = new Question('Prenom : ', 'Yann');
        $helper = $this->getHelper('question');
        $prenom = $helper->ask($input, $output, $question);
        $output->writeln('Hello '.$prenom);
    }
}
