<?php

/**
 * Test: ScriptTest
 */

use Minetro\Social\Facebook\Script;
use Tester\Assert;

require __DIR__ . '/../../bootstrap.php';

test(function () {
    $script = new Script();

    $id = 1;
    $script->setAppId($id);

    Assert::equal($id, $script->getAppId());
    Assert::count(0, $script->build()->getChildren());
});