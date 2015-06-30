<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class CommentAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('username', 'text', array('label' => 'Пользователь'))
            ->add('usermessage', 'textarea', array('label' => 'Отзыв пользователя'))
            ->add('adminreply', 'textarea', array('label' => 'Ответ пользователю', 'required' => false))
            ->add('status', 'choice', array(
                        'choices' => array('0' => 'Скрывать отзыв', '1' => 'Показывать отзыв'),
                        'label' => 'Статус'))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('username', null, array('label' => 'Пользователь'))
            ->add('status',
                    'doctrine_orm_choice',
                    array(
                        'label' => 'Статус',
                        'field_type' => 'checkbox'
                        ),
                    'choice' , array(
                        'choices' => array(
                            '0' => 'Скрывать отзыв',
                            '1' => 'Показывать отзыв'
                            )
                        )
            )
            ->add('adminreply', 'doctrine_orm_callback', array(
                'callback' => function($queryBuilder, $alias, $field, $value) {
                    if (!$value['value']) {
                        return;
                    }
                    
                    if($value['value']==='NULL') {
                        $queryBuilder->andWhere('o.adminreply IS NULL');
                    } elseif($value['value']==='NOT NULL') {
                        $queryBuilder->andWhere('o.adminreply IS NOT NULL');
                    }
                    
                    return true;
                },
                        'field_type' => 'checkbox',
                        'label'=> 'Ответ'
                        ),
                  'choice' , array(
                        'choices' => array(
                            'NULL' => 'Без ответа',
                            'NOT NULL' => 'Отвечен'
                            )
                        ))
            ->add('datecr', 'doctrine_orm_datetime_range', array('input_type' => 'timestamp', 'label' => 'Время создания'))
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('username', 'text', array('label' => 'Пользователь'))
            ->add('status', 'choice', array(
                        'choices' => array('' => 'Скрывать отзыв', '0' => 'Скрывать отзыв', '1' => 'Показывать отзыв'),
                        'label' => 'Статус'))
            ->add('adminreply', 'boolean', array(
                        'label' => 'Ответ'
                        )
                 )
            ->add('datecr', 'datetime', array('label' => 'Время создания'))
        ;
    }
}