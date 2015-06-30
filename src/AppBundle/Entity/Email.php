<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Email
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Email
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="mailto", type="string", length=255)
     */
    private $mailto;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set mailto
     *
     * @param string $mailto
     * @return Email
     */
    public function setMailto($mailto)
    {
        $this->mailto = $mailto;

        return $this;
    }

    /**
     * Get mailto
     *
     * @return string 
     */
    public function getMailto()
    {
        return $this->mailto;
    }
}
