<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * Widget
 *
 * @ORM\Table(name="widgets")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\WidgetRepository")
 */
class Widget
{
	/**
	 * Hook timestampable behavior
	 * Updates createdAt, updatedAt fields
	 */
	use TimestampableEntity;

	/**
	 * @var int
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="name", type="string", length=50)
	 */
	private $name;

	/**
	 * @var Company
	 *
	 * @ManyToOne(targetEntity="AppBundle\Entity\Company", inversedBy="widgets")
	 * @JoinColumn(name="company_id", referencedColumnName="id", nullable=false)
	 */
	private $company;

	/**
	 * @var \Doctrine\Common\Collections\ArrayCollection
	 *
	 * @OneToMany(targetEntity="AppBundle\Entity\Call", mappedBy="widget")
	 */
	private $calls;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->calls = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set name
     *
     * @param string $name
     *
     * @return Widget
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set company
     *
     * @param \AppBundle\Entity\Company $company
     *
     * @return Widget
     */
    public function setCompany(\AppBundle\Entity\Company $company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \AppBundle\Entity\Company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Add call
     *
     * @param \AppBundle\Entity\Call $call
     *
     * @return Widget
     */
    public function addCall(\AppBundle\Entity\Call $call)
    {
        $this->calls[] = $call;

        return $this;
    }

    /**
     * Remove call
     *
     * @param \AppBundle\Entity\Call $call
     */
    public function removeCall(\AppBundle\Entity\Call $call)
    {
        $this->calls->removeElement($call);
    }

    /**
     * Get calls
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCalls()
    {
        return $this->calls;
    }
}
