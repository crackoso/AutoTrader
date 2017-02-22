<?php

namespace tests\CarBundle\Service;


use CarBundle\Service\DataChecker;
use Doctrine\ORM\EntityManager;
use Symfony\Component\VarDumper\Cloner\Data;


class DataCheckerTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var EntityManager|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $entityManager;

    public function setUp()
    {
        $this->entityManager = $this->getMockBuilder('Doctrine\ORM\EntityManager')->disableOriginalConstructor()->getMock();
    }

    public function testCheckCarWithRequiredPhotosWillReturnFalse()
    {
        //Mocking the DataChecker Object and expecting the result as false
        $subject = new DataChecker($this->entityManager, true);
        $expectedResult = false;

        //Mocking the CarBundle\Entity\Car
        $car = $this->getMock('CarBundle\Entity\Car');
        //Expecting to be called once the method SetPromote with the expected result False
        $car->expects($this->once())
            ->method('setPromote')
            ->with($expectedResult);

        //Expecting to call once the method persist with the object car mocked
        $this->entityManager->expects($this->once())
            ->method('persist')
            ->with($car);

        //Expecting to call once the method flush
        $this->entityManager->expects($this->once())
            ->method('flush');

        //mocking the method passing the object
        $result = $subject->checkCar($car);

        //Checking if the result is the expected one
        $this->assertEquals($expectedResult, $result);
    }

}
