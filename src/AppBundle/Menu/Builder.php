<?php

namespace AppBundle\Menu;
use Knp\Menu\MenuFactory;

/*
 * @Description     Using the menu builder to manage easily
 *                  the urls in the system
 * @Author          Hibran Martinez <crack.oso@gmail.com>
 */
class Builder{
    public function mainMenu(MenuFactory $factory, array $options){
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav navbar-nav');
        $menu->addChild('Home', ['route' => 'homepage']);
        $menu->addChild('Cars', ['route' => 'orders']);
        
        return $menu;
    }
}