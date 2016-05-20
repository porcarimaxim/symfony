<?php

namespace AppBundle\Controller\Api;

use AppBundle\Entity\Call;
use AppBundle\Form\CallType;
use FOS\RestBundle\Controller\Annotations\QueryParam;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Request\ParamFetcher;
use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Util\Codes;
use Symfony\Component\HttpFoundation\Request;

class CallController extends FOSRestController implements ClassResourceInterface
{
	/**
	 * List
	 *
	 * @QueryParam(name="number", description="the number of the call")
	 * @QueryParam(name="page", default="1", requirements="\d+", description="number of page")
	 * @View()
	 *
	 * @param ParamFetcher $paramFetcher
	 * @return array
	 */
	public function cgetAction(ParamFetcher $paramFetcher)
	{
		$filters = [
			'number' => $paramFetcher->get('number')
		];

		$qb = $this->getDoctrine()
			->getRepository('AppBundle:Call')
			->findByFilter($filters)
			->orderBy('call.id', 'DESC');

		$pagination = $this->get('knp_paginator')
			->paginate(
				$qb,
				(int)$paramFetcher->get('page')
			);

		return ['calls' => $pagination];
	}

	/**
	 * Get one
	 *
	 * @View()
	 *
	 * @param Call $call
	 * @return Call
	 */
	public function getAction(Call $call)
	{
		return ['call' => $call];
	}

	/**
	 * Create
	 *
	 * @View()
	 *
	 * @param Request $request
	 * @return \FOS\RestBundle\View\View|\Symfony\Component\Form\Form
	 */
	public function postAction(Request $request)
	{
		return $this->processForm(new Call(), $request);
	}

	/**
	 * Update
	 *
	 * @View()
	 *
	 * @param Call $call
	 * @param Request $request
	 * @return \FOS\RestBundle\View\View|\Symfony\Component\Form\Form
	 */
	public function putAction(Call $call, Request $request)
	{
		return $this->processForm($call, $request);
	}

	/**
	 * Partial update
	 *
	 * @View()
	 *
	 * @param Call $call
	 * @param Request $request
	 * @return \FOS\RestBundle\View\View|\Symfony\Component\Form\Form
	 */
	public function patchAction(Call $call, Request $request)
	{
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
				return $this->routeRedirectView('api_get_call', ['call' => $call->getId()], Codes::HTTP_CREATED);
			}

			return null;
		}

		return $form;
	}

	/**
	 * Delete
	 *
	 * @View()
	 *
	 * @param Call $call
	 * @return null
	 */
	public function deleteAction(Call $call)
	{
		$em = $this->getDoctrine()->getManager();

		$em->remove($call);
		$em->flush();

		return null;
	}
}