<?php

namespace AppBundle\Controller\Api\Widget;

use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

/**
 * Class WidgetController
 *
 * @package AppBundle\Controller\Api\Widget
 */
class WidgetController extends FOSRestController implements ClassResourceInterface
{
	/**
	 * Get one widget by uuid
	 *
	 * @View(serializerGroups={"Public"})
	 *
	 * @ApiDoc()
	 *
	 * @param string $uuid
	 * @return array
	 */
	public function getAction($uuid)
	{
		$em = $this->getDoctrine()->getManager();

		$widget = $em->getRepository('AppBundle:Widget')
			->findOneBy(['uuid' => $uuid]);

		if (!$widget) {
			throw $this->createNotFoundException('Widget not found');
		}

		return ['widget' => $widget];
	}
}