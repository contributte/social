<?php declare(strict_types = 1);

namespace Contributte\Social\Facebook;

use Nette\Application\UI\Control as NetteControl;
use Nette\Bridges\ApplicationLatte\Template;
use Nette\Utils\Html;

/**
 * Abstract control for facebook plugins
 *
 * @property-read Template $template
 */
abstract class Control extends NetteControl
{

	/** @var Attributes */
	protected $attributes;

	public function __construct()
	{
		$this->attributes = new Attributes();
	}

	/** GETTERS ***************************************************************/

	public function getAttributes(): Attributes
	{
		return $this->attributes;
	}

	/** HELPERS ***************************************************************/

	/**
	 * @param Attributes|array<string, string> $attributes
	 */
	protected function createElement($attributes): Html
	{
		$el = Html::el('div');

		foreach ($attributes as $key => $val) {
			$el->setAttribute($key, $val);
		}

		return $el;
	}

	/** ABSTRACT **************************************************************/

	abstract public function build(): Html;

}
