<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Price
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Price
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
     * @ORM\Column(name="pricename", type="string", length=255, unique=true)
     */
    private $pricename;

    /**
     * @var integer
     *
     * @ORM\Column(name="price", type="integer")
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="priceinfo", type="text", nullable=true)
     */
    private $priceinfo;

    /**
     * @var integer
     *
     * @ORM\Column(name="seats", type="integer")
     */
    private $seats;


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
     * Set pricename
     *
     * @param string $pricename
     * @return Price
     */
    public function setPricename($pricename)
    {
        $this->pricename = $pricename;

        return $this;
    }

    /**
     * Get pricename
     *
     * @return string 
     */
    public function getPricename()
    {
        return $this->pricename;
    }

    /**
     * Set price
     *
     * @param integer $price
     * @return Price
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return integer 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set priceinfo
     *
     * @param string $priceinfo
     * @return Price
     */
    public function setPriceinfo($priceinfo)
    {
        $this->priceinfo = $priceinfo;

        return $this;
    }

    /**
     * Get priceinfo
     *
     * @return string 
     */
    public function getPriceinfo()
    {
        return $this->priceinfo;
    }

    /**
     * Set seats
     *
     * @param integer $seats
     * @return Price
     */
    public function setSeats($seats)
    {
        $this->seats = $seats;

        return $this;
    }

    /**
     * Get seats
     *
     * @return integer 
     */
    public function getSeats()
    {
        return $this->seats;
    }
}
