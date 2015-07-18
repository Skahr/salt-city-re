<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Price
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\PriceRepository")
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
     * @var integer
     *
     * @ORM\Column(name="price", type="integer")
     */
    private $price;

    /**
     * @var integer
     *
     * @ORM\Column(name="vip", type="integer")
     */
    private $vip;

    /**
     * @var integer
     *
     * @ORM\Column(name="hygiene", type="integer")
     */
    private $hygiene;

    /**
     * @var integer
     *
     * @ORM\Column(name="day", type="integer")
     */
    private $day;

    /**
     * @var integer
     *
     * @ORM\Column(name="evening", type="integer")
     */
    private $evening;

    /**
     * @var integer
     *
     * @ORM\Column(name="special", type="integer")
     */
    private $special;


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
     * Set vip
     *
     * @param integer $vip
     * @return Price
     */
    public function setVip($vip)
    {
        $this->vip = $vip;

        return $this;
    }

    /**
     * Get vip
     *
     * @return integer 
     */
    public function getVip()
    {
        return $this->vip;
    }

    /**
     * Set hygiene
     *
     * @param integer $hygiene
     * @return Price
     */
    public function setHygiene($hygiene)
    {
        $this->hygiene = $hygiene;

        return $this;
    }

    /**
     * Get hygiene
     *
     * @return integer 
     */
    public function getHygiene()
    {
        return $this->hygiene;
    }

    /**
     * Set day
     *
     * @param integer $day
     * @return Price
     */
    public function setDay($day)
    {
        $this->day = $day;

        return $this;
    }

    /**
     * Get day
     *
     * @return integer 
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * Set evening
     *
     * @param integer $evening
     * @return Price
     */
    public function setEvening($evening)
    {
        $this->evening = $evening;

        return $this;
    }

    /**
     * Get evening
     *
     * @return integer 
     */
    public function getEvening()
    {
        return $this->evening;
    }

    /**
     * Set special
     *
     * @param integer $special
     * @return Price
     */
    public function setSpecial($special)
    {
        $this->special = $special;

        return $this;
    }

    /**
     * Get special
     *
     * @return integer 
     */
    public function getSpecial()
    {
        return $this->special;
    }
}
