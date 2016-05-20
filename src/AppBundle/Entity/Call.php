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
	 * @ORM\Column(type="string", length=50)
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
	 * @ORM\Column(type="string", length=255, nullable=true)
	 */
	private $twoWords;

	/**
	 * @ManyToOne(targetEntity="AppBundle\Entity\Company", inversedBy="calls")
	 * @JoinColumn(name="company_id", referencedColumnName="id", nullable=false)
	 */
	private $company;


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

	/**
	 * Set twoWords
	 *
	 * @param string $twoWords
	 *
	 * @return Call
	 */
	public function setTwoWords($twoWords)
	{
		$this->twoWords = $twoWords;

		return $this;
	}

	/**
	 * Get twoWords
	 *
	 * @return string
	 */
	public function getTwoWords()
	{
		return $this->twoWords;
	}

    /**
     * Set company
     *
     * @param \AppBundle\Entity\Company $company
     *
     * @return Call
     */
    public function setCompany(\AppBundle\Entity\Company $company = null)
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
}
