<?php

namespace AppBundle\Controller\Api\Widget;

use AppBundle\Entity\Call;
use AppBundle\Form\CallType;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\Controller\Annotations\View;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;

class CallController extends FOSRestController implements ClassResourceInterface
{
	/**
	 * Create a call (member of widget)
	 *
	 * @View(serializerGroups={"Public"}, statusCode=FOS\RestBundle\Util\Codes::HTTP_CREATED)
	 *
	 * @ApiDoc()
	 *
	 * @param string $uuid
	 * @param Request $request
	 * @return \FOS\RestBundle\View\View|\Symfony\Component\Form\Form
	 */
	public function postAction($uuid, Request $request)
	{
		$em = $this->getDoctrine()->getManager();

		$widget = $em->getRepository('AppBundle:Widget')
			->findOneBy(['uuid' => $uuid]);

		if (!$widget) {
			throw $this->createNotFoundException('Widget not found');
		}

		$call = new Call();
		$call->setWidget($widget);

		return $this->processForm($call, $request);
	}
	
	/**
	 * Handle post, put and patch actions
	 *
	 * @param Call $call
	 * @param Request $request
	 * @return \FOS\RestBundle\View\View|null|\Symfony\Component\Form\Form
	 */
	private function processForm(Call $call, Request $request)
	{
		$form = $this->createForm(CallType::class, $call);

		$form->submit($request->request->get($form->getName()), !$request->isMethod('PATCH'));

		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($call);
			$em->flush();

			if ($request->isMethod('POST')) {
				return ['call' => $call];
			}

			return null;
		}

		return $form;
	}
}