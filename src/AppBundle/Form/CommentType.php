<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class CommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', 'text', array('attr' => array('placeholder' => 'Ваше имя'), 'label' => false))
            ->add('usermessage', 'textarea', array('attr' => array('placeholder' => 'Отзыв'), 'label' => false))
            ->add('Отправить', 'submit')
        ;
    }

    public function getName()
    {
        return 'comment';
    }
}