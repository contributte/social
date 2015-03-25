<?php

/**
 * Test: AttributesTest
 */

use Minetro\Social\Facebook\Attributes;
use Tester\Assert;

require __DIR__ . '/../../bootstrap.php';

test(function () {
    $attrs = new Attributes();

    Assert::count(0, $attrs->getAttributes());
    Assert::count(0, $attrs);
});

test(function () {
    $attrs = new Attributes();

    $name = 'test';
    $value = 'value';
    $attrs->add($name, $value);

    Assert::count(1, $attrs->getAttributes());
    Assert::count(1, $attrs);

    $array = $attrs->getAttributes();
    Assert::equal($value, $array[$name]);
});

test(function () {
    $attrs = new Attributes();

    $name = 'test';
    $dataname = 'data-test';
    $value = 'value';
    $attrs->data($name, $value);

    Assert::equal($value, $attrs->getAttributes()[$dataname]);
});


test(function () {
    $attrs = new Attributes();

    $name = 'test';
    $value = 'value1';
    $attrs->add($name, $value);
    Assert::count(1, $attrs);
    Assert::equal($value, $attrs->getAttributes()[$name]);

    $value2 = 'value2';
    $attrs->add($name, $value2);
    Assert::count(1, $attrs);
    Assert::equal($value2, $attrs->getAttributes()[$name]);
});

test(function () {
    $attrs = new Attributes();

    Assert::false(isset($attrs->test));

    $value = 'test';
    $attrs->test = $value;
    Assert::true(isset($attrs->test));
    Assert::equal($value, $attrs->test);
});

test(function () {
    Assert::throws(function () {
        $attrs = new Attributes();
        $attrs->test;
    }, 'Nette\MemberAccessException', 'Cannot read attribute test');
});

