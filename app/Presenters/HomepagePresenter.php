<?php
declare(strict_types=1);

namespace GymSpit\WebProject\Presenters;

use GymSpit\WebProject\Model\GuestBookService;
use Nette\Application\UI;


class HomepagePresenter extends UI\Presenter
{
	/** @inject */
	public GuestBookService $guestBookModel;


	public function renderDefault(): void
	{
		$this->template->posts = $this->guestBookModel->getAll();
	}
}
