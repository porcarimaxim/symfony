<?php

namespace AppBundle\Controller\Api\Widget;

use AppBundle\Entity\Widget;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;

class WidgetController extends FOSRestController implements ClassResourceInterface
{
	/**
	 * Get
	 *
	 * @View(serializerGroups={"Public"})
	 *
	 * @param Widget $widget
	 * @return array
	 */
	public function getAction(Widget $widget)
	{
		return ['widget' => $widget];
	}
}