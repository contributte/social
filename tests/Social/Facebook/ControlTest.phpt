<?php

/**
 * Test: ControlTest
 */

use Minetro\Social\Facebook\Control;
use Nette\Utils\Html;
use Tester\Assert;
use Minetro\Social\Facebook\Attributes;

require __DIR__ . '/../../bootstrap.php';

final class ControlMock extends Control
{

    /**
     * @return Html
     */
    public function build()
    {
        return Html::el('div');
    }

    public function createElement($data) {
        return parent::createElement($data);
    }

}

test(function () {
    $control = new ControlMock();

    Assert::equal((string)Html::el('div'), (string)$control->build());
});

test(function () {
    $control = new ControlMock();

    $attrs = new Attributes();
    $attrs->add('test', '12345');
    $out = $control->createElement($attrs);

    Assert::equal($attrs['test'], $out->test);
});

