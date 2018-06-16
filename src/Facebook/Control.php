<?php declare(strict_types = 1);

namespace Contributte\Social\Facebook;

use Nette\Application\UI\Control as NetteControl;
use Nette\ComponentModel\IContainer;
use Nette\Utils\Html;

/**
 * Abstract control for facebook plugins
 */
abstract class Control extends NetteControl
{

	/** @var Attributes */
	protected $attributes;

	/**
	 * @param string $name
	 */
	public function __construct(?IContainer $parent = null, $name = null)
	{
		parent::__construct($parent, $name);
		$this->attributes = new Attributes();
	}

	/** GETTERS ***************************************************************/

	public function getAttributes(): Attributes
	{
		return $this->attributes;
	}

	/** HELPERS ***************************************************************/

	/**
	 * @param Attributes|mixed[] $attributes
	 */
	protected function createElement($attributes): Html
	{
		$el = Html::el('div');

		foreach ($attributes as $key => $val) {
			$el->$key = $val;
		}

		return $el;
	}

	/** ABSTRACT **************************************************************/

	abstract public function build(): Html;

}
