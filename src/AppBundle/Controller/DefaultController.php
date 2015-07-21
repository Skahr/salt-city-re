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

    /**
     * @Route("/salt/", name="salt")
     */
    public function saltAction()
    {
        return $this->render('default/salt.html.twig');
    }

    /**
     * @Route("/salt/certificates", name="salt_cert")
     */
    public function saltCertAction()
    {
        return $this->render('default/salt_cert.html.twig');
    }

    /**
     * @Route("/salt/contraindications", name="salt_contr")
     */
    public function saltContrAction()
    {
        return $this->render('default/salt_contr.html.twig');
    }

    /**
     * @Route("/salt/indications", name="salt_ind")
     */
    public function saltIndAction()
    {
        return $this->render('default/salt_indications.html.twig');
    }

    /**
     * @Route("/salt/rules", name="salt_rules")
     */
    public function saltRulesAction()
    {
        return $this->render('default/salt_rules.html.twig');
    }
}
