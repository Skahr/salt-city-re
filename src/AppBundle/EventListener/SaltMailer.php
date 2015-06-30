<?php
namespace AppBundle\EventListener;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\Templating\EngineInterface;
use Doctrine\ORM\Event\LifecycleEventArgs;
use AppBundle\Entity\Comment;

class SaltMailer extends ContainerAware
{
    public function postPersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        if ($entity instanceof Comment) {
            $em = $args->getEntityManager();
            $emails = $em->getRepository('AppBundle:Email')->findAll();
            $message = \Swift_Message::newInstance()
            ->setSubject('Соль Сити: новый отзыв')
            ->setFrom(array('mail@salt-city.ru' => 'СольCity'))
            ->setBody($this->container->get('templating')->render(
                    'email_moderator.html.twig',
                    array('id' => $entity->getId())
                ),
                'text/html'
            );
            foreach($emails as $i) {
                $message->setTo($i->getMailto());
            }
            $this->container->get('mailer')->send($message);
        }
    }
}