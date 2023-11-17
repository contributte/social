<?php declare(strict_types = 1);

namespace Contributte\Social\Facebook\EmbeddedPosts;

use Contributte\Social\Facebook\Control;
use Nette\Utils\Html;

class EmbeddedPosts extends Control
{

	public function build(): Html
	{
		return $this->createElement($this->attributes);
	}

	public function render(): void
	{
		echo $this->build();
	}

}
