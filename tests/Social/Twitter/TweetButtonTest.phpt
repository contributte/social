<?php

/**
 * Test: TweetButtonTest
 */

use Minetro\Social\Twitter\TweetButton;
use Nette\Utils\Html;
use Tester\Assert;

require __DIR__ . '/../../bootstrap.php';

test(function () {
    $button = new TweetButton();

    $button->setCount(1);
    Assert::equal(1, $button->getCount());

    $button->setCounturl('http://google.com');
    Assert::equal('http://google.com', $button->getCounturl());

    $button->setDnt(TRUE);
    Assert::true($button->isDnt());

    $button->setElementText('text');
    Assert::equal('text', $button->getElementText());

    $button->setHashtags(['tag1', 'tag2']);
    Assert::equal(['tag1', 'tag2'], $button->getHashtags());
    $button->addHashtag('tag3');
    Assert::equal(['tag1', 'tag2', 'tag3'], $button->getHashtags());

    $button->setHref('http://google.cz');
    Assert::equal('http://google.cz', $button->getHref());

    $button->setUrl('http://google.org');
    Assert::equal('http://google.org', $button->getUrl());

    $button->setVia('via');
    Assert::equal('via', $button->getVia());

    $button->setText('text2');
    Assert::equal('text2', $button->getText());

    $button->setRelated('rel');
    Assert::equal('rel', $button->getRelated());

    $button->setSize(1);
    Assert::equal(1, $button->getSize());

    $button->setLang('cz');
    Assert::equal('cz', $button->getLang());

    $button->setElementPrototype($html = Html::el());
    Assert::same($html, $button->getElementPrototype());

    $button->setProperties(['prop1', 'prop2']);
    Assert::equal(['prop1', 'prop2'], $button->getProperties());
    $button->addProperty('prop3', 1);
    Assert::equal(['prop1', 'prop2', 'prop3' => 1], $button->getProperties());
});

test(function () {
    $button = new TweetButton();

    ob_start();
    $button->renderJs();
    Assert::contains('text/javascript', ob_get_contents());
    ob_end_clean();
});

test(function () {
    $button = new TweetButton();
    $button->setShareButton('share');

    Assert::equal('Tweet share', $button->getElementText());
});

test(function () {
    $button = new TweetButton();
    $button->setMentionButton('mention');

    Assert::equal('Tweet to @mention', $button->getElementText());
});

test(function () {
    $button = new TweetButton();
    $button->setHashtagButton('hash');

    Assert::equal('Tweet #hash', $button->getElementText());
});

test(function () {
    $button = new TweetButton();
    $url = 'http://google.com';

    ob_start();
    $button->render($url);
    Assert::contains($url, ob_get_contents());
    ob_end_clean();

    $url = 'http://google.cz';
    $button->setUrl($url);

    ob_start();
    $button->render();
    Assert::contains($url, ob_get_contents());
    ob_end_clean();
});