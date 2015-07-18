<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class PriceAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('price', 'integer', array('label' => 'Стоимость за сеанс', 'attr' => array('min' => 0)))
            ->add('vip', 'integer', array('label' => 'Скидка по ВИП', 'attr' => array('min' => 0, 'max' => 100)))
            ->add('hygiene', 'integer', array('label' => 'Скидка на гигиену', 'attr' => array('min' => 0, 'max' => 100)))
            ->add('day', 'integer', array('label' => 'Скидка на день', 'attr' => array('min' => 0, 'max' => 100)))
            ->add('evening', 'integer', array('label' => 'Скидка на вечер', 'attr' => array('min' => 0, 'max' => 100)))
            ->add('special', 'integer', array('label' => 'Скидка по инд. режиму', 'attr' => array('min' => 0, 'max' => 100)))

        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('price', null, array('label' => 'Стоимость за сеанс'))
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id', 'integer', array('label' => 'ИД'))
            ->add('price', 'integer', array('label' => 'Стоимость за сеанс'))
            ->add('vip', 'integer', array('label' => 'Скидка по ВИП'))
            ->add('hygiene', 'integer', array('label' => 'Скидка на гигиену'))
            ->add('day', 'integer', array('label' => 'Скидка на день'))
            ->add('evening', 'integer', array('label' => 'Скидка на вечер'))
            ->add('special', 'integer', array('label' => 'Скидка по инд. режиму'))
        ;
    }
}
