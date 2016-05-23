<?php

namespace AppBundle\Controller\Api\Widget;

use AppBundle\Entity\Widget;
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
	 * Get one widget by id
	 *
	 * @View(serializerGroups={"Public"})
	 *
	 * @ApiDoc()
	 *
	 * @param Widget $widget
	 * @return array
	 */
	public function getAction(Widget $widget)
	{
		return ['widget' => $widget];
	}
}