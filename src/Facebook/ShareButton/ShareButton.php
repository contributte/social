<?php declare(strict_types = 1);

namespace Contributte\Social\Facebook\ShareButton;

use Contributte\Social\Facebook\Control;
use Nette\Utils\Html;

/**
 * ShareButton control
 */
class ShareButton extends Control
{

	/** Layouts */
	public const LAYOUT_BOX_COUNT = 'box_count';
	public const LAYOUT_BUTTON_COUNT = 'button_count';
	public const LAYOUT_BUTTON = 'button';
	public const LAYOUT_ICON_LINK = 'icon_link';
	public const LAYOUT_ICON = 'icon';
	public const LAYOUT_LINK = 'link';

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
