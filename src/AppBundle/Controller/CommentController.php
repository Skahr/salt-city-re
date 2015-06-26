<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Comment;
use AppBundle\Form\CommentType;

/**
 * Comment controller.
 *
 */
class CommentController extends Controller
{
    /**
     * Lists all Comment entities.
     * @Route("comments", name="comments")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('AppBundle:Comment')->createQueryBuilder('q')
            ->where('q.status = 1')
            ->orderBy('q.datecr', 'DESC')
            ->getQuery()->getResult();
        $entity = new Comment();
        $form   = $this->createForm(new CommentType(), $entity, array(
            'action' => $this->generateUrl('comments_create'),
            'method' => 'POST',
        ));
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
        $entities,
        $request->query->get('page', 1)/*page number*/,
        10/*limit per page*/
        );
        $pagination->setTemplate('KnpPaginatorBundle:Pagination:twitter_bootstrap_v3_pagination.html.twig');
        return $this->render('Comment/index.html.twig', array(
            'entities' => $entities,
            'form'   => $form->createView(),
            'pagination' => $pagination
        ));
    }
    /**
     * Creates a new Comment entity.
     * @Route("comments/create", name="comments_create")
     * @Method("POST")
     */
    public function createAction(Request $request)
    {
        $entity = new Comment();
        $form = $this->createForm(new CommentType(), $entity);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->set('info', 'Спасибо! Ваш отзыв будет опубликован после проверки модератором');
            return $this->redirect($this->generateUrl('comments'));
        }
        return $this->render('Comment/index.html.twig', array(
            'entities' => $entities,
            'form'   => $form->createView(),
            'pagination' => $pagination
        ));
    }
}