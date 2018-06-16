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
 * @property array $hashtags
 * @property string $size
 * @property bool $dnt
 * @property string $lang
 * @property Html $elementPrototype
 * @property string $elementText
 * @property array $properties
 */
class TweetButton extends Control
{

	/** Size constants */
	public const SIZE_MEDIUM = 'medium';
	public const SIZE_LARGE = 'large';

	/** Countbox constants */
	public const COUNTBOX_NONE = 'none';
	public const COUNTBOX_VERTICAL = 'vertical';
	public const COUNTBOX_HORIZONTAL = 'horizontal';

	/** Platform URL */
	public const TWITTER_PLATFORM_URL = 'https://platform.twitter.com/widgets.js';

	/** Twitter URLs */
	public const TWITTER_SHARE_URL = 'https://twitter.com/share';
	public const TWITTER_TWEET_URL = 'https://twitter.com/intent/tweet';

	/**
	 * URL of the page to share
	 *
	 * @var string
	 */
	private $url;

	/**
	 * Twitter href (share/tweet/etc..)
	 *
	 * @var string
	 */
	private $href = self::TWITTER_SHARE_URL;

	/**
	 * Screen name of the user to attribute the Tweet to
	 *
	 * @var string
	 */
	private $via;

	/**
	 * Default Tweet text
	 *
	 * @var string
	 */
	private $text;

	/**
	 * Related accounts
	 *
	 * @var string
	 */
	private $related;

	/**
	 * Count box position
	 *
	 * @var string
	 */
	private $count = self::COUNTBOX_VERTICAL;

	/**
	 * URL to which your shared URL resolves
	 *
	 * @var string
	 */
	private $counturl;

	/**
	 * Array hashtags appended to tweet text
	 *
	 * @var mixed[]
	 */
	private $hashtags = [];

	/**
	 * The size of the rendered button
	 *
	 * @var string
	 */
	private $size = self::SIZE_MEDIUM;

	/**
	 * Help us tailor content and suggestions for Twitter users
	 *
	 * @var bool
	 */
	private $dnt = false;

	/**
	 * The language for the Tweet Button
	 *
	 * @var string
	 */
	private $lang = 'en';

	/**
	 * Html element prototype
	 *
	 * @var Html
	 */
	private $element;

	/**
	 * Element inner text
	 *
	 * @var string
	 */
	private $elementText = 'Tweet';

	/**
	 * Custom element properties
	 *
	 * @var mixed[]
	 */
	private $properties = [];

	public function __construct()
	{
		parent::__construct();
		$this->element = Html::el('a class="twitter twitter-button"');
	}

	/** SETTERS/GETTERS *******************************************************/

	public function getUrl(): string
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

	public function getVia(): string
	{
		return $this->via;
	}

	public function setVia(string $via): self
	{
		$this->via = $via;

		return $this;
	}

	public function getText(): string
	{
		return $this->text;
	}

	public function setText(string $text): self
	{
		$this->text = $text;

		return $this;
	}

	public function getRelated(): string
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

	public function getCounturl(): string
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
	 * @return mixed[]
	 */
	public function getHashtags(): array
	{
		return $this->hashtags;
	}

	/**
	 * @param mixed[] $hashtags
	 */
	public function setHashtags(array $hashtags): self
	{
		$this->hashtags = $hashtags;

		return $this;
	}

	public function addHashtag($hashtag): self
	{
		$this->hashtags[] = $hashtag;

		return $this;
	}

	public function getSize(): string
	{
		return $this->size;
	}

	/**
	 * @param string $size
	 */
	public function setSize($size): self
	{
		$this->size = $size;

		return $this;
	}

	public function isDnt(): bool
	{
		return $this->dnt;
	}

	/**
	 * @param bool $dnt
	 */
	public function setDnt($dnt): self
	{
		$this->dnt = (bool) $dnt;

		return $this;
	}

	public function getLang(): string
	{
		return $this->lang;
	}

	/**
	 * @param string $lang
	 */
	public function setLang($lang): self
	{
		$this->lang = $lang;

		return $this;
	}

	public function getElementText(): string
	{
		return $this->elementText;
	}

	/**
	 * @param string $elementText
	 */
	public function setElementText($elementText): self
	{
		$this->elementText = $elementText;

		return $this;
	}

	/**
	 * @param Html $element
	 */
	public function setElementPrototype($element): void
	{
		$this->element = $element;
	}

	public function getElementPrototype(): Html
	{
		return $this->element;
	}

	/**
	 * @return mixed[]
	 */
	public function getProperties(): array
	{
		return $this->properties;
	}

	/**
	 * @param mixed[] $properties
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

	/** HELPERS ***************************************************************/

	/**
	 * Configure share button
	 *
	 * @param string $text [optional]
	 */
	public function setShareButton($text = null): void
	{
		$this->element->addClass('twitter-share-button');
		$this->href = self::TWITTER_SHARE_URL;

		if ($text) {
			$this->elementText = 'Tweet ' . $text;
		}
	}

	/**
	 * Configure mention button
	 *
	 * @param string $mention
	 */
	public function setMentionButton($mention = null): void
	{
		$this->element->addClass('twitter-mention-button');

		// Build URL
		$url = new Url(self::TWITTER_TWEET_URL);
		$url->setQueryParameter('screen_name', $mention);
		$this->href = (string) $url;

		if ($mention) {
			$this->elementText = 'Tweet to @' . $mention;
		}
	}

	/**
	 * Configure hashtag button
	 *
	 * @param string $hashtag
	 */
	public function setHashtagButton($hashtag = null): void
	{
		$this->element->addClass('twitter-hashtag-button');

		// Build URL
		$url = new Url(self::TWITTER_TWEET_URL);
		$url->setQueryParameter('button_hashtag', $hashtag);
		$this->href = (string) $url;

		if ($hashtag) {
			$this->elementText = 'Tweet #' . $hashtag;
		}
	}

	/** RENDERS ***************************************************************/

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
			$el->{'data-url'} = $url;
		} elseif ($this->url !== null) {
			$el->{'data-url'} = $this->url;
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
			if ($value !== null && !empty($value)) {
				$el->{'data-' . $key} = $value;
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
