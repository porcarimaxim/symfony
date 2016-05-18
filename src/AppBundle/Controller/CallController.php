<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Call;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\Controller\Annotations\RouteResource;
use FOS\RestBundle\Controller\Annotations\View;

/**
 * @RouteResource("Call")
 */
class CallController extends FOSRestController implements ClassResourceInterface
{
	/**
	 * List
	 *
	 * @View()
	 *
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function cgetAction()
	{
		$calls = $this->getDoctrine()
			->getRepository('AppBundle:Call')
			->findAll();

		return $calls;
	}

	/**
	 * Get one call by id
	 *
	 * @View()
	 *
	 * @param Call $call
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function getAction(Call $call)
	{
		return $call;
	}
}