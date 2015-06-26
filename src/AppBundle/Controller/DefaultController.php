<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        return $this->render('default/index.html.twig');
    }
    
    /**
     * @Route("salt/photo/{id}", name="photo", defaults={"id" = 1})
     */
    public function saltPhotoAction($id)
    {
        return $this->render('default/salt_photo.html.twig', array('id' => $id));
    }
}
