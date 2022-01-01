<?php declare(strict_types = 1);

/**
 * Test: OGTest
 */

use Contributte\Social\Facebook\OG\OG;
use Tester\Assert;

require __DIR__ . '/../../../bootstrap.php';

test(function (): void {
	$og = new OG();

	Assert::count(0, $og->getTags());
	Assert::count(0, $og->build()->getChildren());
});

test(function (): void {
	$og = new OG();

	$name = 'name1';
	$value = 'value1';
	$og->add($name, $value);

	Assert::count(1, $og->getTags());
	Assert::count(1, $og->build()->getChildren());

	$og->setTags([$name => $value]);
	Assert::count(1, $og->getTags());
	Assert::count(1, $og->build()->getChildren());
});

test(function (): void {
	$og = new OG();

	$name = 'name1';
	$value = 'value1';
	$og->add($name, $value);

	ob_start();
	$og->render();
	Assert::equal('<meta property="name1" content="value1">', ob_get_contents());
	ob_end_clean();
});
