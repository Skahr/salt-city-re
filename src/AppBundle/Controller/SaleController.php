<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Skahr\AppBundle\Entity\Sale;

/**
 * Sale controller.
 *
 */
class SaleController extends Controller
{
    /**
     * Lists all Sale entities.
     * @Route("sales", name="sales")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('AppBundle:Sale')->findBy(array(), array('datecr' => 'DESC'));

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
        $entities,
        $request->query->get('page', 1)/*page number*/,
        10/*limit per page*/
        );
        $pagination->setTemplate('KnpPaginatorBundle:Pagination:twitter_bootstrap_v3_pagination.html.twig');

        return $this->render('Sale/index.html.twig', array(
            'entities' => $entities,
            'pagination' => $pagination,
        ));
    }
    /**
     * Carousel list
     */
    public function topSalesAction($max)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
                'SELECT p.salestext
                FROM AppBundle:Sale p
                WHERE p.status = 1
                ORDER BY p.datecr DESC'
            )->setMaxResults($max);
        $entities = $query->getResult();
        
        return $this->render('default/sales.html.twig', array(
            'entities' => $entities,
        ));
    }
}