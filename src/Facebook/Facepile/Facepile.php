<?php declare(strict_types = 1);

namespace Contributte\Social\Facebook\Facepile;

use Contributte\Social\Facebook\Control;
use Nette\Utils\Html;

/**
 * Facepile control
 *
 * @deprecated
 */
class Facepile extends Control
{

	/** Shemes */
	public const SCHEME_LIGHT = 'light';
	public const SCHEME_DARK = 'dark';

	/** Photo sizes */
	public const SIZE_LARGE = 'large';
	public const SIZE_MEDIUM = 'medium';
	public const SIZE_SMALL = 'small';

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
