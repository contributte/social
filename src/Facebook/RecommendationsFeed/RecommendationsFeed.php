<?php declare(strict_types = 1);

namespace Contributte\Social\Facebook\RecommendationsFeed;

use Contributte\Social\Facebook\Control;
use Nette\Utils\Html;

/**
 * RecommendationsFeed control
 *
 * @deprecated
 */
class RecommendationsFeed extends Control
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
