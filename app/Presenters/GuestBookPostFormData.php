<?php
declare(strict_types=1);

namespace GymSpit\WebProject\Presenters;

use Nette;


class GuestBookPostFormData
{
	use Nette\SmartObject;

	public string $author;

	public string $text;
}
