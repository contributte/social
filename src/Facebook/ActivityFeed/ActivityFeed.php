<?php declare(strict_types = 1);

namespace Contributte\Social\Facebook\ActivityFeed;

use Contributte\Social\Facebook\Control;
use Nette\Utils\Html;

/**
 * ActivityFeed control
 *
 * @deprecated
 */
class ActivityFeed extends Control
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
