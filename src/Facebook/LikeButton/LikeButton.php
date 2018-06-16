<?php declare(strict_types = 1);

namespace Contributte\Social\Facebook\LikeButton;

use Contributte\Social\Facebook\Control;
use Nette\Utils\Html;

/**
 * LikeButton control
 */
class LikeButton extends Control
{

	/** Layouts */
	public const LAYOUT_STANDARD = 'standard';
	public const LAYOUT_BOX_COUNT = 'box_count';
	public const LAYOUT_BUTTON_COUNT = 'button_count';
	public const LAYOUT_BUTTON = 'button';

	/** Actions */
	public const ACTION_LIKE = 'like';
	public const ACTION_RECOMMEND = 'recommend';

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

	public function renderFaces(): void
	{
		$this->attributes->add('data-layout', self::LAYOUT_STANDARD);
		$this->attributes->add('data-show-faces', true);
		$this->render();
	}

	public function renderButton(): void
	{
		$this->attributes->add('data-layout', self::LAYOUT_BUTTON);
		$this->attributes->add('data-show-faces', true);
		$this->render();
	}

	public function renderCount(): void
	{
		$this->attributes->add('data-layout', self::LAYOUT_BUTTON_COUNT);
		$this->attributes->add('data-show-faces', true);
		$this->render();
	}

	public function renderBox(): void
	{
		$this->attributes->add('data-layout', self::LAYOUT_BOX_COUNT);
		$this->attributes->add('data-show-faces', true);
		$this->render();
	}

}
