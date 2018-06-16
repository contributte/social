<?php declare(strict_types = 1);

namespace Contributte\Social\Facebook\Comments;

use Contributte\Social\Facebook\Control;
use Nette\Utils\Html;

/**
 * Comments control
 */
class Comments extends Control
{

	/** Shemes */
	public const SCHEME_LIGHT = 'light';
	public const SCHEME_DARK = 'dark';

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
