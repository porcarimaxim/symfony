<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * Company
 *
 * @ORM\Table(name="companies")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CompanyRepository")
 */
class Company
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
	 * @ORM\Column(name="name", type="string", length=100)
	 */
	private $name;

	/**
	 * @var \Doctrine\Common\Collections\ArrayCollection
	 *
	 * @OneToMany(targetEntity="AppBundle\Entity\User", mappedBy="company")
	 */
	private $users;

	/**
	 * @var \Doctrine\Common\Collections\ArrayCollection
	 *
	 * @OneToMany(targetEntity="AppBundle\Entity\Widget", mappedBy="company")
	 */
	private $widgets;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
        $this->widgets = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Company
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
     * Add user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Company
     */
    public function addUser(\AppBundle\Entity\User $user)
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \AppBundle\Entity\User $user
     */
    public function removeUser(\AppBundle\Entity\User $user)
    {
        $this->users->removeElement($user);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Add widget
     *
     * @param \AppBundle\Entity\Widget $widget
     *
     * @return Company
     */
    public function addWidget(\AppBundle\Entity\Widget $widget)
    {
        $this->widgets[] = $widget;

        return $this;
    }

    /**
     * Remove widget
     *
     * @param \AppBundle\Entity\Widget $widget
     */
    public function removeWidget(\AppBundle\Entity\Widget $widget)
    {
        $this->widgets->removeElement($widget);
    }

    /**
     * Get widgets
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getWidgets()
    {
        return $this->widgets;
    }
}
