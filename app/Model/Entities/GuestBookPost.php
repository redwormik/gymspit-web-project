<?php
declare(strict_types=1);

namespace GymSpit\WebProject\Model\Entities;

use Doctrine\ORM\Mapping as ORM;
use Nette;


/**
 * @ORM\Entity
 * @property-read ?int $id
 * @property-read string $author
 * @property-read string $text
 * @property-read Nette\Utils\DateTime $createdAt
 */
class GuestBookPost
{
	use Nette\SmartObject;

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue
	 */
	private ?int $id;

	/** @ORM\Column */
	private string $author;

	/** @ORM\Column(type="text") */
	private string $text;

	/** @ORM\Column(type="datetime") */
	private \DateTime $createdAt;


	public function __construct(string $author, string $text, \DateTime $createdAt)
	{
		$this->author = $author;
		$this->text = $text;
		$this->createdAt = $createdAt;
	}


	public function __clone()
	{
		$this->id = null;
	}


	public function getId(): ?int
	{
		return $this->id;
	}


	public function getAuthor(): string
	{
		return $this->author;
	}


	public function getText(): string
	{
		return $this->text;
	}


	public function getCreatedAt(): Nette\Utils\DateTime
	{
		return Nette\Utils\DateTime::from($this->createdAt);
	}
}
