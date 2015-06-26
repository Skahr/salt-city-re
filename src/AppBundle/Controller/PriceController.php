<?php
namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Price;

/**
 * Price controller.
 *
 */
class PriceController extends Controller
{
    /**
     * Lists all Price entities.
     *
     */
    public function mainPricesAction($max)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
                'SELECT p.pricename, p.price, p.priceinfo, p.seats
                FROM AppBundle:Price p'
            )->setMaxResults($max);
        $entities = $query->getResult();
        
        return $this->render('default/pricesblock.html.twig', array(
            'entities' => $entities,
        ));
    }
}