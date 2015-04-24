<?php

/**
 * Test: OGTest
 */

use Minetro\Social\Facebook\OG;
use Tester\Assert;

require __DIR__ . '/../../bootstrap.php';

test(function () {
    $og = new OG();

    Assert::count(0, $og->getTags());
    Assert::count(0, $og->build()->getChildren());
});

test(function () {
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

test(function () {
    $og = new OG();

    $name = 'name1';
    $value = 'value1';
    $og->add($name, $value);

    $res = $og->render();
    Assert::equal('<meta property="name1" content="value1">', (string)$res);
});
