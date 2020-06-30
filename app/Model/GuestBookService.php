<?php
declare(strict_types=1);

namespace GymSpit\WebProject\Model;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Nette;


class GuestBookService
{
	use Nette\SmartObject;

	private EntityManagerInterface $entityManager;

	/** @var EntityRepository<Entities\GuestBookPost> */
	private EntityRepository $repository;


	public function __construct(EntityManagerInterface $entityManager)
	{
		$this->entityManager = $entityManager;
		$this->repository = $this->entityManager->getRepository(Entities\GuestBookPost::class);
	}


	/**
	 * @return array<int, Entities\GuestBookPost>
	 */
	public function getAll(): array
	{
		return $this->repository->findBy([], ['createdAt' => 'DESC']);
	}
}
