<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Call;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\Controller\Annotations\RouteResource;

/**
 * @RouteResource("Call")
 */
class CallController extends FOSRestController implements ClassResourceInterface
{
	/**
	 * List
	 *
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function cgetAction()
	{
		$calls = $this->getDoctrine()
			->getRepository('AppBundle:Call')
			->findAll();

		$view = $this->view($calls, 200);

		return $this->handleView($view);
	}

	/**
	 * Get one call by id
	 *
	 * @param Call $call
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function getAction(Call $call)
	{
		$view = $this->view($call, 200);

		return $this->handleView($view);
	}
}