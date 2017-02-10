<?php
namespace AppBundle\Command;

use AppBundle\Entity\ProductType;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

/**
 * Class CreateProductTypeCommand
 * @author Yann Le Scouarnec <yann.le-scouarnec@hetic.net>
 * @package AppBundle\Command
 */
class CreateProductTypeCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            ->setName('producttype:add')
            ->setDescription('Ajout de product type.')
            ->setHelp("Cette commande sert un peu plus")
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $question = new Question('<question>Entrer le nouveau type de produit: </question>');
        $helper = $this->getHelper('question');
        $productTypeName = $helper->ask($input, $output, $question);
        $em = $this->getContainer()->get('doctrine')->getManager();
        $productType = new ProductType();
        $productType->setName($productTypeName);
        $em->persist($productType);
        $em->flush();
        if($productType->getId() > 0){
            $output->writeln('<info>Création du type de produit "'.$productTypeName.'" confirmée (id '.$productType->getId().')</info>');
        } else {
            $output->writeln('<error>Insertion b0rked</error>');
        }
    }
}