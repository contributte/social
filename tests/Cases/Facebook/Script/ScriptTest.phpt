<?php declare(strict_types = 1);

/**
 * Test: ScriptTest
 */

use Contributte\Social\Facebook\Script\Script;
use Tester\Assert;

require __DIR__ . '/../../../bootstrap.php';

test(function (): void {
	$script = new Script();

	$id = 1;
	$version = 'v1.0';
	$script->setAppId($id);
	$script->setApiVersion($version);

	Assert::equal($id, $script->getAppId());
	Assert::equal($version, $script->getApiVersion());
	Assert::count(0, $script->build()->getChildren());
});
