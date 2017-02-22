<?php

namespace CarBundle\Command;

use CarBundle\Command\DataChecker;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class AbcCheckCarsCommand extends Command
{
    /**
     * @var DataChecker
     */
    protected $carChecker;

    /**
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * AbcCheckCarsCommand constructor.
     * @param DataChecker $carChecker
     * @param EntityManager $entityManager
     */
    public function __construct($carChecker, EntityManager $entityManager)
    {
        $this->carChecker = $carChecker;
        $this->entityManager = $entityManager;
        parent::__construct();
    }


    protected function configure()
    {
        $this
            ->setName('abc:check-cars')
            ->setDescription('...')
            ->addArgument('format', InputArgument::OPTIONAL, 'Progress format')
            ->addOption('option', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $carRepository = $this->entityManager->getRepository('CarBundle:Car');
        $cars = $carRepository->findAll();
        $bar = new ProgressBar($output, count($cars));

        $argument = $input->getArgument('format');
        $bar->setFormat($argument);
        $bar->start();
        foreach ($cars as $car){
            $this->carChecker->checkCar($car);
            $bar->advance();
            sleep(0.3);
        }
        $bar->finish();
    }

}
