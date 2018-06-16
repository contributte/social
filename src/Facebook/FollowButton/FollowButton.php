<?php declare(strict_types = 1);

namespace Contributte\Social\Facebook\FollowButton;

use Contributte\Social\Facebook\Control;
use Nette\Utils\Html;

/**
 * FollowButton control
 */
class FollowButton extends Control
{

	/** Layouts */
	public const LAYOUT_STANDARD = 'standard';
	public const LAYOUT_BOX_COUNT = 'box_count';
	public const LAYOUT_BUTTON_COUNT = 'button_count';
	public const LAYOUT_BUTTON = 'button';

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
