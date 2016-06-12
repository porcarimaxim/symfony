<?php

namespace AppBundle\Util;

use Swift_Mailer;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class EmailUtil
 * 
 * @package AppBundle\Util
 */
class EmailUtil
{
	/**
	 * @var Swift_Mailer
	 */
	private $mailer;

	/**
	 * @var ContainerInterface
	 */
	private $container;

	/**
	 * Construct
	 *
	 * @param Swift_Mailer $mailer
	 * @param ContainerInterface $container
	 */
	public function __construct(Swift_Mailer $mailer, ContainerInterface $container)
	{
		$this->mailer = $mailer;
		$this->container = $container;
	}

	/**
	 * Send email
	 *
	 * @param $to
	 * @param $subject
	 * @param $body
	 * @param null $from
	 * @return int
	 */
	public function sendEmail($to, $subject, $body, $from = null)
	{
		if ($from === null) {
			$from = $this->container->getParameter('app_no_reply_email');
		}

		$message = \Swift_Message::newInstance();
		$message->setSubject($subject)
			->setFrom($from)
			->setTo($to)
			->setBody(
				$body,
				'text/plain'
			);
		return $this->mailer->send($message);
	}
}