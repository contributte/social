<?php declare(strict_types = 1);

/**
 * Test: PlusOneTest
 */

use Contributte\Social\Google\PlusOne\PlusOne;
use Nette\Utils\Html;
use Tester\Assert;

require __DIR__ . '/../../../bootstrap.php';

test(function (): void {
	$p1 = new PlusOne();

	$p1->setUrl('http://google.com');
	Assert::equal('http://google.com', $p1->getUrl());

	$p1->setLang('cs');
	Assert::equal('cs', $p1->getLang());

	$p1->setSize($p1::SIZE_MEDIUM);
	Assert::equal($p1::SIZE_MEDIUM, $p1->getSize());

	$p1->setMode($p1::MODE_DEFAULT);
	Assert::equal($p1::MODE_DEFAULT, $p1->getMode());

	$p1->setCallback('c');
	Assert::equal('c', $p1->getCallback());

	$p1->setWidth(100);
	Assert::equal(100, $p1->getWidth());

	Assert::type('Nette\Utils\Html', $p1->getElementPrototype());
	$el = Html::el('span');
	$p1->setElementPrototype($el);
	Assert::same($el, $p1->getElementPrototype());

	$p1->setProperties(['prop1', 'prop2']);
	Assert::equal(['prop1', 'prop2'], $p1->getProperties());
	$p1->addProperty('prop3', '1');
	Assert::equal(['prop1', 'prop2', 'prop3' => '1'], $p1->getProperties());
});

test(function (): void {
	$url = 'www.google.com';
	$p1 = new PlusOne();
	$p1->setCallback('c');
	$p1->addProperty('p', 'pv1');

	ob_start();
	$p1->render($url);
	Assert::contains($url, ob_get_contents());
	ob_end_clean();

	$url2 = 'www.google.cz';
	$p1->setUrl($url2);
	ob_start();
	$p1->render();
	Assert::contains($url2, ob_get_contents());
	ob_end_clean();
});

test(function (): void {
	$p1 = new PlusOne();
	$p1->setLang('cs');

	ob_start();
	$p1->setMode($p1::MODE_DEFAULT);
	$p1->renderJs();
	Assert::contains("{lang: 'cs'}", ob_get_contents());
	ob_end_clean();

	ob_start();
	$p1->setMode($p1::MODE_EXPLICIT);
	$p1->renderJs();
	Assert::contains("{lang: 'cs', parsetags: 'explicit'}", ob_get_contents());
	ob_end_clean();

	ob_start();
	$p1->setMode($p1::MODE_DYNAMIC);
	$p1->renderJs();
	Assert::contains("{lang: 'cs'}", ob_get_contents());
	Assert::contains('po.async=true', ob_get_contents());
	ob_end_clean();
});
