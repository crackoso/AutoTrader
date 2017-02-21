<?php

namespace CarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Description     In this class we can find the Default controllers
 *                  for the CarBundle
 * @Author          Hibran Martinez <crack.oso@gmail.com>
 */
class DefaultController extends Controller
{
    /**
     * Look for all the cars
     * @Route("/", name="orders")
     */
    public function indexAction()
    {
        $carRepository = $this->getDoctrine()->getRepository('CarBundle:Car');
        $cars = $carRepository->findCarsWithDetails();
        return $this->render('CarBundle:Default:index.html.twig', ['cars' => $cars]);
    }

    /**
     * Look for a car by id with details
     * @param $id
     * @Route("/{id}", name="show_car")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction($id){
        $carRepository = $this->getDoctrine()->getRepository('CarBundle:Car');
        $car = $carRepository->findCarsWithDetailsById($id);
        return $this->render('CarBundle:Default:show.html.twig', ['car' => $car]);
    }
}
