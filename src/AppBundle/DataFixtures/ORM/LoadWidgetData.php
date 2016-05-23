<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Company;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Widget;

/**
 * Class LoadWidgetData
 *
 * @package AppBundle\DataFixtures\ORM
 */
class LoadWidgetData extends AbstractFixture implements OrderedFixtureInterface
{
	/**
	 * @param ObjectManager $manager
	 */
	public function load(ObjectManager $manager)
	{
		/**
		 * @var Company $company
		 */
		$company = $this->getReference('main-company');

		$widget = new Widget();
		$widget->setName('Web Site #1');
		
		$widget->setCompany($company);
		
		$manager->persist($widget);
		$manager->flush();
	}

	/**
	 * @return int
	 */
	public function getOrder()
	{
		return 2;
	}
}