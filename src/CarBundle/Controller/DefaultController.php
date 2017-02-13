<?php

namespace CarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/*
 * @Description     In this class we can find the Default controllers
 *                  for the CarBundle
 * @Author          Hibran Martinez <crack.oso@gmail.com>
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="orders")
     */
    public function indexAction()
    {
        $cars = [
            ['make' => 'BMW', 'name' => 'X1'],
            ['make' => 'Honda', 'name' => 'Accord'],
            ['make' => 'Tesla', 'name' => 'S3'],
        ];
        return $this->render('CarBundle:Default:index.html.twig', ['cars' => $cars]);
    }
}
