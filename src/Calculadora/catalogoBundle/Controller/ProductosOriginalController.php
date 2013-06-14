<?php

namespace Calculadora\catalogoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
/*
 * 
 */
class ProductoController extends Controller
{
    /**
     * @Route("/list")
     * @Template()
     */
    public function listAction(){
        $em = $this
                ->getDoctrine()
                ->getEntityManager();
        $repository = $em->getRepository('CalculadoracatalogoBundle:Producto'); 
        $productos= $repository->findAll();
        return array('productos'=>$productos);
    }

}
