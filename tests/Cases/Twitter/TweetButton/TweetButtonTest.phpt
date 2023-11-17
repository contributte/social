<?php declare(strict_types = 1);

use Contributte\Social\Twitter\TweetButton\TweetButton;
use Contributte\Tester\Toolkit;
use Nette\Utils\Html;
use Tester\Assert;

require __DIR__ . '/../../../bootstrap.php';

Toolkit::test(function (): void {
	$button = new TweetButton();

	$button->setCount('foo');
	Assert::equal('foo', $button->getCount());

	$button->setCounturl('http://google.com');
	Assert::equal('http://google.com', $button->getCounturl());

	$button->setDnt(true);
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

	$button->setSize('foo');
	Assert::equal('foo', $button->getSize());

	$button->setLang('cz');
	Assert::equal('cz', $button->getLang());

	$button->setElementPrototype($html = Html::el());
	Assert::same($html, $button->getElementPrototype());

	$button->setProperties(['prop1', 'prop2']);
	Assert::equal(['prop1', 'prop2'], $button->getProperties());
	$button->addProperty('prop3', '1');
	Assert::equal(['prop1', 'prop2', 'prop3' => '1'], $button->getProperties());
});

Toolkit::test(function (): void {
	$button = new TweetButton();

	ob_start();
	$button->renderJs();
	Assert::contains('text/javascript', ob_get_contents());
	ob_end_clean();
});

Toolkit::test(function (): void {
	$button = new TweetButton();
	$button->setShareButton('share');

	Assert::equal('Tweet share', $button->getElementText());
});

Toolkit::test(function (): void {
	$button = new TweetButton();
	$button->setMentionButton('mention');

	Assert::equal('Tweet to @mention', $button->getElementText());
});

Toolkit::test(function (): void {
	$button = new TweetButton();
	$button->setHashtagButton('hash');

	Assert::equal('Tweet #hash', $button->getElementText());
});

Toolkit::test(function (): void {
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
