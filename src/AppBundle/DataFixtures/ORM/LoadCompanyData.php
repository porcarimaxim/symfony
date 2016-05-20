<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Company;

/**
 * Class LoadCompanyData
 *
 * @package AppBundle\DataFixtures\ORM
 */
class LoadCompanyData extends AbstractFixture implements OrderedFixtureInterface
{
	/**
	 * @param ObjectManager $manager
	 */
	public function load(ObjectManager $manager)
	{
		$company = new Company();
		$company->setName('Call me back');
		
		$manager->persist($company);
		$manager->flush();

		$this->addReference('main-company', $company);
	}

	/**
	 * @return int
	 */
	public function getOrder()
	{
		return 1;
	}
}