<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Call;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
	/**
	 * Show calls
	 *
	 * @Route("/", name="home_page")
	 *
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function indexAction()
	{
		$em = $this->getDoctrine()->getManager();

		$calls = $em->getRepository('AppBundle:Call')
			->findBy([], ['id' => 'ASC']);

		return $this->render('default/index.html.twig', [
			'calls' => $calls
		]);
	}

	/**
	 * Show all calls (ignore delete flag)
	 *
	 * @Route("/show-all", name="home_all")
	 *
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function showAllAction()
	{
		$em = $this->getDoctrine()->getManager();
		$em->getFilters()->disable('softdeleteable');

		return $this->indexAction();
	}

	/**
	 * Test soft deletable extension
	 *
	 * @Route("/delete/{id}", name="home_delete")
	 *
	 * @param Call $call
	 * @return \Symfony\Component\HttpFoundation\RedirectResponse
	 */
	public function deleteAction(Call $call)
	{
		$em = $this->getDoctrine()->getManager();

		$em->remove($call);
		$em->flush();

		return $this->redirectToRoute('home_page');
	}
}
