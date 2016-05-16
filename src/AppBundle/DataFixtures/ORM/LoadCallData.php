<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Call;

/**
 * Class LoadCallData
 *
 * @package AppBundle\DataFixtures\ORM
 */
class LoadCallData implements FixtureInterface
{
	/**
	 * @param ObjectManager $manager
	 */
	public function load(ObjectManager $manager)
	{
		for ($i = 100; $i < 199; $i++) {
			$call = new Call();
			$call->setNumber('+37379125' . $i);
			$manager->persist($call);
		}

		$manager->flush();
	}
}