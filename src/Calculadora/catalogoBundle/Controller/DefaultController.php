<?php

namespace Calculadora\catalogoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/producto")
     * @Template()
     */
    public function indexAction()
    {
    $producto = new \Calculadora\catalogoBundle\Entity\Producto();
    $producto->setNombre('un Producto');
    $producto->setPrecio(19.99);
   $em=$this->getDoctrine()->getManager();
    $marca= new \Calculadora\catalogoBundle\Entity\Marca();
    $marca->setNombre('una Marca');
    
    $producto->setMarca($marca);
    
    $em->persist($producto);
    $em->flush();
    
    return array('name' => $producto->getId());
    }
}
