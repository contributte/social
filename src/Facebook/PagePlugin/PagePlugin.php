<?php declare(strict_types = 1);

namespace Contributte\Social\Facebook\PagePlugin;

use Contributte\Social\Facebook\Control;
use Nette\Utils\Html;

/**
 * PagePlugin control
 *
 * @deprecated
 */
class PagePlugin extends Control
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
