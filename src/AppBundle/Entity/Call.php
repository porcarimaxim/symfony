<?php

namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use JMS\Serializer\Annotation\Accessor;

/**
 * Call
 *
 * @ORM\Table(name="calls")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CallRepository")
 *
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false)
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
	 * @ORM\Column(type="string", length=50)
	 *
	 * @Assert\NotBlank()
	 */
	private $number;

	/**
	 * @var string
	 *
	 * @ORM\Column(type="string", length=255, nullable=true)
	 */
	private $description;

	/**
	 * @var string
	 *
	 * @Accessor(getter="getNumber",setter="setNumber")
	 */
	protected $virtualNumber;


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
	 * Set id
	 *
	 * @param $id
	 * @return Call
	 */
	public function setId($id)
	{
		$this->id = $id;

		return $this;
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
}

