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
            ->add('pricename', 'text', array('label' => 'Название тарифа'))
            ->add('price', 'integer', array('label' => 'Стоимость за сеанс'))
            ->add('seats', 'integer', array('label' => 'Кол-во мест', 'attr' => array('value' => 1, 'min' => 1)))
            ->add('priceinfo', 'textarea', array('label' => 'Подробности', 'required' => false))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('pricename', null, array('label' => 'Название тарифа'))
            ->add('price', null, array('label' => 'Стоимость за сеанс'))
            ->add('seats', null, array('label' => 'Кол-во мест'))
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('pricename', 'text', array('label' => 'Название тарифа'))
            ->add('price', 'integer', array('label' => 'Стоимость за сеанс'))
            ->add('seats', 'integer', array('label' => 'Кол-во мест'))
            ->add('priceinfo', 'textarea', array('label' => 'Подробности'))
        ;
    }
}