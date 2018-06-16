<?php declare(strict_types = 1);

namespace Contributte\Social\Facebook\EmbeddedVideos;

use Contributte\Social\Facebook\Control;
use Nette\Utils\Html;

/**
 * EmbeddedVideos control
 */
class EmbeddedVideos extends Control
{

	/** API *******************************************************************/

	public function build(): Html
	{
		return $this->createElement($this->attributes);
	}

	/** RENDERS ***************************************************************/

	public function render(): void
	{
		echo $this->build();
	}

}
