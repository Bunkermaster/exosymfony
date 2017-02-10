<?php
namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

/**
 * Class ProductTypeListCommand
 * @author Yann Le Scouarnec <yann.le-scouarnec@hetic.net>
 * @package AppBundle\Command
 */
class ProductTypeListCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('producttype:list')
            ->setDescription('Lister les types de produits.')
            ->setHelp("Cette commande liste des trucs.")
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            '<info>Product Types</info>',
        ]);
        $em = $this->getContainer()->get('doctrine')->getManager();
        $productTypeRepository = $em->getRepository('AppBundle:ProductType');
        $productTypes = $productTypeRepository->findAll();
        foreach($productTypes as $productType){
            $output->writeln('<comment>  * '.$productType->getId().' > '.$productType->getName().'</comment>');
        }
    }
}