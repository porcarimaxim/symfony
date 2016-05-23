<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Company;
use AppBundle\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class LoadUserData
 *
 * @package AppBundle\DataFixtures\ORM
 */
class LoadUserData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
	/**
	 * @var ContainerInterface
	 */
	private $container;

	/**
	 * @param ContainerInterface|null $container
	 */
	public function setContainer(ContainerInterface $container = null)
	{
		$this->container = $container;
	}

	/**
	 * @param ObjectManager $manager
	 */
	public function load(ObjectManager $manager)
	{
		$userManager = $this->container->get('fos_user.user_manager');

		/**
		 * @var Company $company
		 */
		$company = $this->getReference('main-company');

		/**
		 * @var UserInterface|User $user
		 */
		$user = $userManager->createUser();
		$user->setUsername('admin');
		$user->setEmail('admin@cmb.local');
		$user->setPlainPassword('admin');
		$user->setEnabled(true);
		$user->setRoles(array('ROLE_SUPER_ADMIN'));

		$user->setCompany($company);

		$userManager->updateUser($user, true);
	}

	/**
	 * @return int
	 */
	public function getOrder()
	{
		return 2;
	}
}