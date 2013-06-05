<?php

namespace Calculadora\CalculadoraBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function indexAction($name)
    {
        return array('name' => $name);
    }
    
   
    /**
     * @Route("/suma/{operador1}/{operador2}",name="suma")
     * @Template("CalculadoraCalculadoraBundle:Default:suma.html.twig")
     */
    public function sumaAction($operador1,$operador2){
            $suma=$operador1 + $operador2;
            return array('suma' => $suma);
    }
    
    /**
     * @Route("/resta/{operador1}/{operador2}",name="resta")
     * @Template("CalculadoraCalculadoraBundle:Default:resta.html.twig")
     */
    public function restaAction($operador1,$operador2){
            $resta=$operador1 - $operador2;
            return array('resta' => $resta);
    }
    /**
     * @Route("/multiplicacion/{operador1}/{operador2}",name="multi")
     * @Template("CalculadoraCalculadoraBundle:Default:multi.html.twig")
     */
    public function multiAction($operador1,$operador2){
            $multi=$operador1 * $operador2;
            return array('multi' => $multi);
    }
    /**
     * @Route("/division/{operador1}/{operador2}",name="divi")
     * @Template("CalculadoraCalculadoraBundle:Default:divi.html.twig")
     */
    public function diviAction($operador1,$operador2){
            $divi=$operador1/$operador2;
            return array('divi' => $divi);
    }
     /**
     * @Route("/header/{var}", name="header")
     * @Template("CalculadoraCalculadoraBundle:Default:header.html.twig")
     */
    public function headerAction($var){
         $texto='<h1>Cabecera Action</h1>';
          return array(
              'texto' => $texto,
               'var' => $var 
                 );
    }
    
}
