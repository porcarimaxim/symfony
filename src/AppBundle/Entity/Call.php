<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;

/**
 * Call
 *
 * @ORM\Table(name="calls")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CallRepository")
 *
 * @Gedmo\SoftDeleteable(fieldName="deletedAt")
 */
class Call
{
	/**
	 * Hook timestampable behavior
	 * Updates createdAt, updatedAt fields
	 */
	use TimestampableEntity;

	/**
	 * Hook SoftDeleteable behavior
	 * updates deletedAt field
	 */
	use SoftDeleteableEntity;

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
	 * @ORM\Column(type="string", length=20)
	 */
	private $number;

	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=255, nullable=true)
	 */
	private $description;

	/**
	 * @var Widget
	 *
	 * @ManyToOne(targetEntity="AppBundle\Entity\Widget", inversedBy="calls")
	 * @JoinColumn(name="widget_id", referencedColumnName="id", nullable=false)
	 */
	private $widget;

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
     * Set number
     *
     * @param string $number
     *
     * @return Call
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Call
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set widget
     *
     * @param \AppBundle\Entity\Widget $widget
     *
     * @return Call
     */
    public function setWidget(\AppBundle\Entity\Widget $widget)
    {
        $this->widget = $widget;

        return $this;
    }

    /**
     * Get widget
     *
     * @return \AppBundle\Entity\Widget
     */
    public function getWidget()
    {
        return $this->widget;
    }
}
