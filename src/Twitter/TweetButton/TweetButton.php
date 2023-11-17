<?php declare(strict_types = 1);

namespace Contributte\Social\Twitter\TweetButton;

use Nette\Application\UI\Control;
use Nette\Http\Url;
use Nette\Utils\Html;
use Nette\Utils\Validators;

/**
 * Twitter > tweet button
 *
 * @property string $url
 * @property string $href
 * @property string $via
 * @property string $text
 * @property string $related
 * @property string $count
 * @property string $counturl
 * @property string[] $hashtags
 * @property string $size
 * @property bool $dnt
 * @property string $lang
 * @property Html $elementPrototype
 * @property string $elementText
 * @property array<string, string> $properties
 */
class TweetButton extends Control
{

	public const SIZE_MEDIUM = 'medium';
	public const SIZE_LARGE = 'large';

	public const COUNTBOX_NONE = 'none';
	public const COUNTBOX_VERTICAL = 'vertical';
	public const COUNTBOX_HORIZONTAL = 'horizontal';

	public const TWITTER_PLATFORM_URL = 'https://platform.twitter.com/widgets.js';

	public const TWITTER_SHARE_URL = 'https://twitter.com/share';
	public const TWITTER_TWEET_URL = 'https://twitter.com/intent/tweet';

	/**
	 * URL of the page to share
	 */
	private ?string $url = null;

	/**
	 * Twitter href (share/tweet/etc..)
	 */
	private string $href = self::TWITTER_SHARE_URL;

	/**
	 * Screen name of the user to attribute the Tweet to
	 */
	private ?string $via = null;

	/**
	 * Default Tweet text
	 */
	private ?string $text = null;

	/**
	 * Related accounts
	 */
	private ?string $related = null;

	/**
	 * Count box position
	 */
	private string $count = self::COUNTBOX_VERTICAL;

	/**
	 * URL to which your shared URL resolves
	 */
	private ?string $counturl = null;

	/**
	 * Array hashtags appended to tweet text
	 *
	 * @var string[]
	 */
	private array $hashtags = [];

	/**
	 * The size of the rendered button
	 */
	private string $size = self::SIZE_MEDIUM;

	/**
	 * Help us tailor content and suggestions for Twitter users
	 */
	private bool $dnt = false;

	/**
	 * The language for the Tweet Button
	 */
	private string $lang = 'en';

	/**
	 * Html element prototype
	 */
	private Html $element;

	/**
	 * Element inner text
	 */
	private string $elementText = 'Tweet';

	/**
	 * Custom element properties
	 *
	 * @var array<string, string>
	 */
	private array $properties = [];

	public function __construct()
	{
		$this->element = Html::el('a class="twitter twitter-button"');
	}

	public function getUrl(): ?string
	{
		return $this->url;
	}

	public function setUrl(string $url): self
	{
		Validators::assert($url, 'string|url');
		$this->url = $url;

		return $this;
	}

	public function getHref(): string
	{
		return $this->href;
	}

	public function setHref(string $href): self
	{
		Validators::assert($href, 'string|url');
		$this->href = $href;

		return $this;
	}

	public function getVia(): ?string
	{
		return $this->via;
	}

	public function setVia(string $via): self
	{
		$this->via = $via;

		return $this;
	}

	public function getText(): ?string
	{
		return $this->text;
	}

	public function setText(string $text): self
	{
		$this->text = $text;

		return $this;
	}

	public function getRelated(): ?string
	{
		return $this->related;
	}

	public function setRelated(string $related): self
	{
		$this->related = $related;

		return $this;
	}

	public function getCount(): string
	{
		return $this->count;
	}

	public function setCount(string $count): self
	{
		$this->count = $count;

		return $this;
	}

	public function getCounturl(): ?string
	{
		return $this->counturl;
	}

	public function setCounturl(string $counturl): self
	{
		Validators::assert($counturl, 'string|url');
		$this->counturl = $counturl;

		return $this;
	}

	/**
	 * @return string[]
	 */
	public function getHashtags(): array
	{
		return $this->hashtags;
	}

	/**
	 * @param string[] $hashtags
	 */
	public function setHashtags(array $hashtags): self
	{
		$this->hashtags = $hashtags;

		return $this;
	}

	public function addHashtag(string $hashtag): self
	{
		$this->hashtags[] = $hashtag;

		return $this;
	}

	public function getSize(): string
	{
		return $this->size;
	}

	public function setSize(string $size): self
	{
		$this->size = $size;

		return $this;
	}

	public function isDnt(): bool
	{
		return $this->dnt;
	}

	public function setDnt(bool $dnt): self
	{
		$this->dnt = $dnt;

		return $this;
	}

	public function getLang(): string
	{
		return $this->lang;
	}

	public function setLang(string $lang): self
	{
		$this->lang = $lang;

		return $this;
	}

	public function getElementText(): string
	{
		return $this->elementText;
	}

	public function setElementText(string $elementText): self
	{
		$this->elementText = $elementText;

		return $this;
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
	 * Configure share button
	 */
	public function setShareButton(?string $text = null): void
	{
		$this->element->addClass('twitter-share-button');
		$this->href = self::TWITTER_SHARE_URL;

		if ($text !== null && $text !== '') {
			$this->elementText = 'Tweet ' . $text;
		}
	}

	/**
	 * Configure mention button
	 */
	public function setMentionButton(?string $mention = null): void
	{
		$this->element->addClass('twitter-mention-button');

		// Build URL
		$url = new Url(self::TWITTER_TWEET_URL);
		$url->setQueryParameter('screen_name', $mention);
		$this->href = (string) $url;

		if ($mention !== null && $mention !== '') {
			$this->elementText = 'Tweet to @' . $mention;
		}
	}

	/**
	 * Configure hashtag button
	 */
	public function setHashtagButton(?string $hashtag = null): void
	{
		$this->element->addClass('twitter-hashtag-button');

		// Build URL
		$url = new Url(self::TWITTER_TWEET_URL);
		$url->setQueryParameter('button_hashtag', $hashtag);
		$this->href = (string) $url;

		if ($hashtag !== null && $hashtag !== '') {
			$this->elementText = 'Tweet #' . $hashtag;
		}
	}

	/**
	 * Render twitter tweet button
	 */
	public function render(?string $url = null): void
	{
		// Get HTML element
		$el = $this->getElementPrototype();
		$el->addText($this->getElementText());
		$el->href($this->getHref());

		// Set URL
		if ($url !== null) {
			Validators::assert($url, 'string|url');
			$el->setAttribute('data-url', $url);
		} elseif ($this->url !== null) {
			$el->setAttribute('data-url', $this->url);
		}

		// List of default properties
		$properties = [
			'via' => $this->via,
			'text' => $this->text,
			'related' => $this->related,
			'count' => $this->count,
			'lang' => $this->lang,
			'counturl' => $this->counturl,
			'hashtags' => $this->hashtags,
			'size' => $this->size,
			'dnt' => $this->dnt,
		];

		// Merge with custom properties
		$properties = array_merge($properties, $this->getProperties());

		// Set properties as data attributes
		foreach ($properties as $key => $value) {
			// @phpstan-ignore-next-line
			if ($value !== null && $value !== '') {
				$el->setAttribute('data-' . $key, $value);
			}
		}

		echo $el;
	}

	/**
	 * Render twitter javascript
	 */
	public function renderJs(): void
	{
		$el = Html::el('script type="text/javascript"');
		$el->addText('window.twttr=(function(d,s,id){var t,js,fjs=d.getElementsByTagName(s)[0];if(d.getElementById(id)){return}js=d.createElement(s);js.id=id;js.src="' . self::TWITTER_PLATFORM_URL . '";fjs.parentNode.insertBefore(js,fjs);return window.twttr||(t={_e:[],ready:function(f){t._e.push(f)}})}(document,"script","twitter-wjs"));');

		echo $el;
	}

}
