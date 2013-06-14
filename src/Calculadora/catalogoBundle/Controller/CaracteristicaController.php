<?php

namespace Calculadora\catalogoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Calculadora\catalogoBundle\Entity\Caracteristica;
use Calculadora\catalogoBundle\Form\CaracteristicaType;

/**
 * Caracteristica controller.
 *
 * @Route("/caracteristica")
 */
class CaracteristicaController extends Controller
{
    /**
     * Lists all Caracteristica entities.
     *
     * @Route("/", name="caracteristica")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CalculadoracatalogoBundle:Caracteristica')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Caracteristica entity.
     *
     * @Route("/", name="caracteristica_create")
     * @Method("POST")
     * @Template("CalculadoracatalogoBundle:Caracteristica:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Caracteristica();
        $form = $this->createForm(new CaracteristicaType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('caracteristica_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Caracteristica entity.
     *
     * @Route("/new", name="caracteristica_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Caracteristica();
        $form   = $this->createForm(new CaracteristicaType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Caracteristica entity.
     *
     * @Route("/{id}", name="caracteristica_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CalculadoracatalogoBundle:Caracteristica')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Caracteristica entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Caracteristica entity.
     *
     * @Route("/{id}/edit", name="caracteristica_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CalculadoracatalogoBundle:Caracteristica')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Caracteristica entity.');
        }

        $editForm = $this->createForm(new CaracteristicaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Caracteristica entity.
     *
     * @Route("/{id}", name="caracteristica_update")
     * @Method("PUT")
     * @Template("CalculadoracatalogoBundle:Caracteristica:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CalculadoracatalogoBundle:Caracteristica')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Caracteristica entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new CaracteristicaType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('caracteristica_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Caracteristica entity.
     *
     * @Route("/{id}", name="caracteristica_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CalculadoracatalogoBundle:Caracteristica')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Caracteristica entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('caracteristica'));
    }

    /**
     * Creates a form to delete a Caracteristica entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
