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
	 * @OneToMany(targetEntity="AppBundle\Entity\Call", mappedBy="company")
	 */
	private $calls;


	/**
	 * Get id
	 *
	 * @return int
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
	 * Constructor
	 */
	public function __construct()
	{
		$this->users = new \Doctrine\Common\Collections\ArrayCollection();
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
	 * Add call
	 *
	 * @param \AppBundle\Entity\Call $call
	 *
	 * @return Company
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