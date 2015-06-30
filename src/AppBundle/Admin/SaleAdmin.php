<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class SaleAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('salestext', 'text', array('label' => 'Текст события'))
            ->add('cat', 'choice', array(
                'choices' => array('0' => 'Новости', '1' => 'Акция'),
                'label' => 'Тип события'))
            ->add('status', 'choice', array(
                'choices' => array('1' => 'Показывать на главной', '0' => 'Не показывать на главной'),
                'label' => 'Статус'))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('salestext', null, array('label' => 'Текст события'))
            ->add('cat',
                    'doctrine_orm_choice',
                    array(
                        'label' => 'Тип события',
                        'field_type' => 'checkbox'
                        ),
                    'choice' , array(
                        'choices' => array(
                            '0' => 'Новости',
                            '1' => 'Акция'
                            )
                        )
            )
            ->add('status',
                    'doctrine_orm_choice',
                    array(
                        'label' => 'Статус',
                        'field_type' => 'checkbox'
                        ),
                    'choice' , array(
                        'choices' => array(
                            '0' => 'Не показывать на главной',
                            '1' => 'Показывать на главной'
                            )
                        )
            )
            ->add('datecr', 'doctrine_orm_datetime_range', array('input_type' => 'timestamp', 'label' => 'Время создания'))
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('salestext')
            ->add('cat', 'choice', array(
                'choices' => array('0' => 'Новости', '1' => 'Акция'),
                'label' => 'Тип события'))
            ->add('status', 'choice', array(
                'choices' => array('1' => 'Показывать на главной', '0' => 'Не показывать на главной'),
                'label' => 'Статус'))
            ->add('datecr', 'datetime', array('label' => 'Создан'))
        ;
    }
}