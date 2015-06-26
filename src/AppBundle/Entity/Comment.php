<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comment
 *
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 */
class Comment
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
     * @ORM\Column(name="username", type="string", length=255)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="usermessage", type="text")
     */
    private $usermessage;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=true)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="adminreply", type="text", nullable=true)
     */
    private $adminreply;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datecr", type="datetime")
     */
    private $datecr;


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
     * Set username
     *
     * @param string $username
     * @return Comment
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set usermessage
     *
     * @param string $usermessage
     * @return Comment
     */
    public function setUsermessage($usermessage)
    {
        $this->usermessage = $usermessage;

        return $this;
    }

    /**
     * Get usermessage
     *
     * @return string 
     */
    public function getUsermessage()
    {
        return $this->usermessage;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return Comment
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set adminreply
     *
     * @param string $adminreply
     * @return Comment
     */
    public function setAdminreply($adminreply)
    {
        $this->adminreply = $adminreply;

        return $this;
    }

    /**
     * Get adminreply
     *
     * @return string 
     */
    public function getAdminreply()
    {
        return $this->adminreply;
    }

    /**
     * Set datecr
     *
     * @param \DateTime $datecr
     * @return Comment
     */
    public function setDatecr($datecr)
    {
        $this->datecr = $datecr;

        return $this;
    }

    /**
     * Get datecr
     *
     * @return \DateTime 
     */
    public function getDatecr()
    {
        return $this->datecr;
    }
    
    /**
    * @ORM\PrePersist
    */
    public function setDatecrValue()
    {
        $this->datecr = new \DateTime();
    }
}
