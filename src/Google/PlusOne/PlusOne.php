<?php declare(strict_types = 1);

namespace Contributte\Social\Google\PlusOne;

use Nette\Application\UI\Control;
use Nette\Utils\Html;
use Nette\Utils\Validators;

/**
 * Google +1 component
 *
 * @property string $size
 * @property string $annotation
 * @property string $callback
 * @property string $url
 * @property int $mode
 * @property int $width
 * @property string $lang
 * @property Html $elementPrototype
 * @property array<string, string> $properties
 */
class PlusOne extends Control
{

	public const SIZE_SMALL = 'small';
	public const SIZE_MEDIUM = 'medium';
	public const SIZE_STANDARD = 'standard';
	public const SIZE_TALL = 'tall';

	public const ANNOTATION_INLINE = 'inline';
	public const ANNOTATION_BUBBLE = 'bubble';
	public const ANNOTATION_NONE = 'none';

	public const MODE_DEFAULT = 1;
	public const MODE_EXPLICIT = 2;
	public const MODE_DYNAMIC = 3;

	public const GOOGLE_PLATFORM_URL = 'https://apis.google.com/js/platform.js';

	public string $size = self::SIZE_STANDARD;

	public string $annotation = self::ANNOTATION_INLINE;

	private string $callback;

	private string $url;

	private int $mode = self::MODE_DEFAULT;

	private int $width = 300;

	private string $lang = 'cs';

	private Html $element;

	/** @var array<string, string> */
	private array $properties = [];

	public function __construct()
	{
		$this->element = Html::el('div class="g-plusone"');
	}

	public function setCallback(string $callback): self
	{
		$this->callback = $callback;

		return $this;
	}

	public function getCallback(): ?string
	{
		return $this->callback;
	}

	public function setMode(int $mode): self
	{
		$this->mode = $mode;

		return $this;
	}

	public function getMode(): int
	{
		return $this->mode;
	}

	public function setLang(string $lang): self
	{
		$this->lang = $lang;

		return $this;
	}

	public function getLang(): string
	{
		return $this->lang;
	}

	public function setSize(string $size): self
	{
		$this->size = $size;

		return $this;
	}

	public function getSize(): string
	{
		return $this->size;
	}

	public function setUrl(string $url): self
	{
		Validators::assert($url, 'string|url');
		$this->url = $url;

		return $this;
	}

	public function getUrl(): string
	{
		return $this->url;
	}

	public function setWidth(int $width): self
	{
		$this->width = $width;

		return $this;
	}

	public function getWidth(): int
	{
		return $this->width;
	}

	public function setElementPrototype(Html $element): void
	{
		$this->element = $element;
	}

	public function getElementPrototype(): Html
	{
		return $this->element;
	}

	/**
	 * @return array<string, string>
	 */
	public function getProperties(): array
	{
		return $this->properties;
	}

	/**
	 * @param array<string, string> $properties
	 */
	public function setProperties(array $properties): self
	{
		$this->properties = $properties;

		return $this;
	}

	public function addProperty(string $name, string $value): self
	{
		$this->properties[$name] = $value;

		return $this;
	}

	/**
	 * Render google +1 button
	 */
	public function render(?string $url = null): void
	{
		// Get HTML element
		$el = $this->getElementPrototype();
		$el->size = $this->size;
		$el->annotation = $this->annotation;

		// Set given URL or filled url
		if ($url !== null) {
			Validators::assert($url, 'string|url');
			$el->href = $url;
		} else {
			$el->href = $this->url;
		}

		// Set width in INLINE mode
		if ($this->annotation === self::ANNOTATION_INLINE) {
			$el->width = $this->width;
		}

		// Set callback, if filled
		if ($this->callback !== null) {
			$el->callback = $this->callback;
		}

		// Set properties as data attributes
		foreach ($this->getProperties() as $key => $value) {
			if ($value !== '') {
				$el->setAttribute('data-' . $key, $value);
			}
		}

		echo $el;
	}

	/**
	 * Render google javascript
	 */
	public function renderJs(): void
	{
		if ($this->mode === self::MODE_DEFAULT) {
			$el = Html::el('script type="text/javascript" async defer');
			$el->src = self::GOOGLE_PLATFORM_URL;
			$el->addText("{lang: '" . $this->lang . "'}");

			echo $el;

		} elseif ($this->mode === self::MODE_EXPLICIT) {
			$wrapper = Html::el();

			$el = Html::el('script type="text/javascript" async defer');
			$el->src = self::GOOGLE_PLATFORM_URL;
			$el->addText("{lang: '" . $this->lang . "', parsetags: 'explicit'}");
			$wrapper->addHtml($el);

			$el = Html::el('script type="text/javascript"');
			$el->addText('gapi.plusone.go();');
			$wrapper->addHtml($el);

			echo $wrapper;

		} elseif ($this->mode === self::MODE_DYNAMIC) {
			$el = Html::el('script type="text/javascript"');
			$el->addText("window.___gcfg = {lang: '" . $this->lang . "'};");
			$el->addText("(function(){var po=document.createElement('script');po.type='text/javascript';po.async=true;po.src='" . self::GOOGLE_PLATFORM_URL . "';vars=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(po, s);})();");

			echo $el;
		}
	}

}
