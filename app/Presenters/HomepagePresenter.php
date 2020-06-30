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


	protected function createComponentPostForm(): UI\Form
	{
		$form = new UI\Form;

		$form->addText('author', 'Autor')
			->setRequired('Prosím vyplňte autora');

		$form->addTextArea('text', 'Text')
			->setRequired('Prosím vyplňte text');

		$form->addSubmit('submit', 'Odeslat');

		$form->onSuccess[] = [$this, 'postFormSucceeded'];
		return $form;
	}


	public function postFormSucceeded(UI\Form $form, \stdClass $values): void
	{
		$this->guestBookModel->create($values->author, $values->text);
		$this->flashMessage('Zpráva odeslána.', 'success');
		$this->redirect('this');
	}
}
