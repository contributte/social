<?php declare(strict_types = 1);

namespace Contributte\Social\Facebook\Comments;

use Contributte\Social\Facebook\Control;
use Nette\Utils\Html;

class Comments extends Control
{

	public const SCHEME_LIGHT = 'light';
	public const SCHEME_DARK = 'dark';

	public function build(): Html
	{
		return $this->createElement($this->attributes);
	}

	public function render(): void
	{
		echo $this->build();
	}

}
