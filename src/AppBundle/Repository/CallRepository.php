<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * CallRepository
 */
class CallRepository extends EntityRepository
{
	/**
	 * Find by filter
	 *
	 * @param $filters
	 * @return \Doctrine\ORM\QueryBuilder
	 */
	public function findByFilter($filters)
	{
		// Define filters
		$defines = [
			'number' => null
		];

		$filters = array_merge($defines, $filters);

		$qb = $this->createQueryBuilder('call');

		if ($filters['number']) {
			$qb->andWhere('call.number = :number')
				->setParameter('number', $filters['number']);
		}

		return $qb;
	}
}
