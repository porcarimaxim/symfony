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
	public function cgetAction()
	{
		$calls = $this->getDoctrine()
			->getRepository('AppBundle:Call')
			->findAll();

		$view = $this->view($calls, 200);

		return $this->handleView($view);
	}

	public function newAction()
	{

	}

	public function getAction(Call $call)
	{
		$view = $this->view($call, 200);

		return $this->handleView($view);
	}
}