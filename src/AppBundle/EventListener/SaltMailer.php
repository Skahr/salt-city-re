<?php
namespace AppBundle\EventListener;

use Symfony\Component\Templating\EngineInterface;
use Doctrine\ORM\Event\LifecycleEventArgs;
use AppBundle\Entity\Comment;

class SaltMailer
{
    protected $mailer;
    protected $templating;

    public function __construct(\Swift_Mailer $mailer, EngineInterface $templating)
    {
        $this->mailer = $mailer;
        $this->templating = $templating;
    }
    public function postPersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        if ($entity instanceof Comment) {
            $em = $args->getEntityManager();
            $emails = $em->getRepository('AppBundle:Email')->findAll();
            $message = \Swift_Message::newInstance()
            ->setSubject('Соль Сити: новый отзыв')
            ->setFrom(array('mail@salt-city.ru' => 'СольCity'))
            ->setBody($this->templating->renderView(
                    'email_moderator.html.twig',
                    array('id' => $entity->getId())
                ),
                'text/html'
            );
            foreach($emails as $i) {
                $message->setTo($i->getMailto());
            }
            $this->mailer->send($message);
        }
    }
}