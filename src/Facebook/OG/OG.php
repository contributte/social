<?php declare(strict_types = 1);

namespace Contributte\Social\Facebook\OG;

use Contributte\Social\Facebook\Control;
use Nette\Utils\Html;

/**
 * OpenGraph control
 */
class OG extends Control
{

	/** @var string[] */
	private $tags = [];

	/**
	 * @param string $name
	 * @param string $value
	 */
	public function add($name, $value): void
	{
		$this->tags[$name] = $value;
	}

	/**
	 * @return string[]
	 */
	public function getTags(): array
	{
		return $this->tags;
	}

	/**
	 * @param string[] $tags
	 */
	public function setTags(array $tags): void
	{
		$this->tags = $tags;
	}

	/** API ********************************************************************/

	public function build(): Html
	{
		$wrapper = Html::el();
		foreach ($this->tags as $property => $content) {
			$wrapper->addHtml(Html::el('meta')->addAttributes([
				'property' => $property,
				'content' => $content,
			]));
		}

		return $wrapper;
	}

	/** RENDERS ***************************************************************/

	public function render(): void
	{
		echo $this->build();
	}

}
