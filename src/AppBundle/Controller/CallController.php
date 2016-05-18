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
	 * @return array
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
	 * @return Call
	 */
	public function getAction(Call $call)
	{
		return $call;
	}

	/**
	 * Delete
	 *
	 * @View()
	 *
	 * @param Call $call
	 */
	public function deleteAction(Call $call)
	{
		$em = $this->getDoctrine()->getManager();

		$em->remove($call);
		$em->flush();
	}
}