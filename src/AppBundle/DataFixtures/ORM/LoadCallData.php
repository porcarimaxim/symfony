<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Widget;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Call;

/**
 * Class LoadCallData
 *
 * @package AppBundle\DataFixtures\ORM
 */
class LoadCallData extends AbstractFixture implements OrderedFixtureInterface
{
	/**
	 * @param ObjectManager $manager
	 */
	public function load(ObjectManager $manager)
	{
		/**
		 * @var Widget $widget
		 */
		$widget = $this->getReference('main-widget');

		for ($i = 100; $i < 199; $i++) {
			$call = new Call();
			$call->setNumber('+37379125' . $i);
			
			$call->setWidget($widget);

			$manager->persist($call);
		}

		$manager->flush();
	}

	/**
	 * @return int
	 */
	public function getOrder()
	{
		return 3;
	}
}