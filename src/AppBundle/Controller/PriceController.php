<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Price;

/**
 * Price controller.
 */
class PriceController extends Controller
{
    /**
     * Lists all Price entities.
     */
    public function mainPricesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('AppBundle:Price')
            ->findLastPrice();

        return $this->render('default/pricesblock.html.twig', array(
            'entities' => $entities,
        ));
    }
}
