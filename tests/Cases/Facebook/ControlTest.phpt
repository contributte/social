<?php declare(strict_types = 1);

use Contributte\Social\Facebook\Control;
use Contributte\Tester\Toolkit;
use Nette\Utils\Html;
use Tester\Assert;

require __DIR__ . '/../../bootstrap.php';

final class ControlMock extends Control
{

	public function build(): Html
	{
		return Html::el('div');
	}

	/**
	 * @inheritdoc
	 */
	public function createElement($data): Html
	{
		return parent::createElement($data);
	}

}

Toolkit::test(function (): void {
	$control = new ControlMock();

	Assert::equal((string) Html::el('div'), (string) $control->build());
});

Toolkit::test(function (): void {
	$control = new ControlMock();

	$attrs = $control->getAttributes();
	$attrs->add('test', '12345');
	$out = $control->createElement($attrs);

	Assert::equal($attrs['test'], $out->test);
	Assert::equal($attrs, $control->getAttributes());
});
