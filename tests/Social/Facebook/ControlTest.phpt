<?php

/**
 * Test: ControlTest
 */

use Minetro\Facebook\Control;
use Nette\Utils\Html;
use Tester\Assert;

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

    public function createElement(array $data = []) {
        return parent::createElement($data);
    }

}

test(function () {
    $control = new ControlMock();

    Assert::equal((string)Html::el('div'), (string)$control->build());
});

test(function () {
    $control = new ControlMock();

    $attrs = ['test' => 'aloha'];
    $out = $control->createElement($attrs);

    Assert::equal($attrs['test'], $out->test);
});

