<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sale
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\SaleRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Sale
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
     * @ORM\Column(name="salestext", type="text")
     */
    private $salestext;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=true)
     */
    private $status;

    /**
     * @var integer
     *
     * @ORM\Column(name="cat", type="integer")
     */
    private $cat;

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
     * Set salestext
     *
     * @param string $salestext
     * @return Sale
     */
    public function setSalestext($salestext)
    {
        $this->salestext = $salestext;

        return $this;
    }

    /**
     * Get salestext
     *
     * @return string
     */
    public function getSalestext()
    {
        return $this->salestext;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return Sale
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
     * Set cat
     *
     * @param integer $cat
     * @return Sale
     */
    public function setCat($cat)
    {
        $this->cat = $cat;

        return $this;
    }

    /**
     * Get cat
     *
     * @return integer
     */
    public function getCat()
    {
        return $this->cat;
    }

    /**
     * Set datecr
     *
     * @param \DateTime $datecr
     * @return Sales
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
