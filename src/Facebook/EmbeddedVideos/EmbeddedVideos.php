<?php declare(strict_types = 1);

namespace Contributte\Social\Facebook\EmbeddedVideos;

use Contributte\Social\Facebook\Control;
use Nette\Utils\Html;

class EmbeddedVideos extends Control
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
