# Social

## Content
- [Install](#install)
- [Facebook](#facebook)
- [Google +1](#google-1)
- [Google Analytics Campaign Maker](#google-analytics-campaign-maker)
- [Twitter](#twitter)

## Install

```
composer require contributte/social
```

## Facebook
Collection of facebook components for Nette 2.4.0.

### Plugins

| Plugin               	| Source 	| Docs 	|
|----------------------	|--------	|------	|
|      Like Button     	| [source](https://github.com/Contributte/social/blob/master/src/Facebook/LikeButton/LikeButton.php) 	                |  [doc](https://developers.facebook.com/docs/plugins/like-button) 	        |
|     Share Button     	| [source](https://github.com/Contributte/social/blob/master/src/Facebook/ShareButton/ShareButton.php) 	                |  [doc](https://developers.facebook.com/docs/plugins/share-button)         |
|      Send Button     	| [source](https://github.com/Contributte/social/blob/master/src/Facebook/SendButton/SendButton.php) 	                |  [doc](https://developers.facebook.com/docs/plugins/send-button) 	        |
|    Embedded Posts    	| [source](https://github.com/Contributte/social/blob/master/src/Facebook/EmbeddedPosts/EmbeddedPosts.php)               |  [doc](https://developers.facebook.com/docs/plugins/embedded-posts) 	    |
|    Embedded Videos   	| [source](https://github.com/Contributte/social/blob/master/src/Facebook/EmbeddedVideos/EmbeddedVideos.php)             |  [doc](https://developers.facebook.com/docs/plugins/embedded-videos) 	    |
|     Follow Button    	| [source](https://github.com/Contributte/social/blob/master/src/Facebook/FollowButton/FollowButton.php) 	            |  [doc](https://developers.facebook.com/docs/plugins/follow-button) 	    |
|       Comments       	| [source](https://github.com/Contributte/social/blob/master/src/Facebook/Comments/Comments.php) 	                    |  [doc](https://developers.facebook.com/docs/plugins/comments) 	        |
|       Page Plugin     | [source](https://github.com/Contributte/social/blob/master/src/Facebook/PagePlugin/PagePlugin.php) 	                |  [doc](https://developers.facebook.com/docs/plugins/page-plugin) 	        |

#### Deprecated
| Plugin               	| Source 	| Docs 	|
|----------------------	|--------	|------	|
|     Activity Feed    	| [source](https://github.com/Contributte/social/blob/master/src/Facebook/ActivityFeed/ActivityFeed.php) 	            |  [doc](https://developers.facebook.com/docs/plugins/activity) 	        |
| Recommendations Feed 	| [source](https://github.com/Contributte/social/blob/master/src/Facebook/RecommendationsFeed/RecommendationsFeed.php) 	|  [doc](https://developers.facebook.com/docs/plugins/recommendations) 	    |
|       Like Box       	| [source](https://github.com/Contributte/social/blob/master/src/Facebook/LikeBox/LikeBox.php) 	                        |  [doc](https://developers.facebook.com/docs/plugins/like-box-for-pages) 	|
|       Facepile       	| [source](https://github.com/Contributte/social/blob/master/src/Facebook/Facepile/Facepile.php) 	                    |  [doc](https://developers.facebook.com/docs/plugins/facepile) 	        |

### Usage

#### Presenter

```php
use Contributte\Social\Facebook\LikeButton;
use Contributte\Social\Facebook\Script;

protected function createComponentLikeButton()
{
    $button = new LikeButton();
    $attrs = $button->getAttributes();

    // URL - manually
    $attrs->add('data-url', $this->link('Home:default'));

    // URL - current
    $attrs->add('data-url', $this->link('//this'));

    // Add other attributes

    $attrs->add('data-layout', $button::LAYOUT_BUTTON_COUNT);
    // OR
    $attrs->data('layout', $button::LAYOUT_BUTTON_COUNT);

    return $button;
}

protected function createComponentScript()
{
    $script = new Script();
    $script->setApiVersion("v2.6");
    $script->setAppId(123456);

    return $script;
}
```

#### Template

You have to display [**JavaScript**](https://developers.facebook.com/docs/javascript) code.

```latte
{control likebutton}
{control script}
```

## Google +1

### Settings

| Type   | Field               | Default               | Setter/Getter | Info                     |
|--------|---------------------|-----------------------|---------------|--------------------------|
| string | `$size`             | standard              | yes/yes       |                          |
| string | `$annotation`       | inline                | yes/yes       | inline/bubble/none       |
| string | `$callback`         | NULL                  | yes/yes       |                          |
| string | `$url`              | NULL                  | yes/yes       |                          |
| int    | `$mode`             | default               | yes/yes       | default/explicit/dynamic |
| int    | `$width`            | 300                   | yes/yes       |                          |
| string | `$lang`             | cs                    | yes/yes       |                          |
| Html   | `$elementPrototype` | div class="g-plusone" | yes/yes       | html prototype           |
| array  | `$properties`       | []                    | yes/yes       |                          |

### Factory

```php
use Contributte\Social\Google\PlusOne;

protected function createComponentPlusone() {
    $button = new PlusOne();
    $button->setMode($button::MODE_DEFAULT);
    $button->setUrl('www.google.com');

    return $button;
}
```

```php
/** @var Contributte\Social\Google\IPlusOneFactory @inject */
public $plusOneFactory;

protected function createComponentPlusone() {
    $button = $this->plusOneFactory->create();
    $button->setMode($button::MODE_DEFAULT);
    $button->setUrl('www.google.com');

    return $button;
}
```

### Template

#### Render javascript

Place before `</body>` or `</head>`.

`{control plusone:js}`

#### Render button

Button #1: `{control plusone}`

Button #2: `{control plusone, $url}`

Button #3: `{control plusone, 'www.seznam.com'}`

## Google Analytics Campaign Maker

Small utility for creating GA accepted parameters to url.

### Parameters

- source
- medium
- campaign
- term
- content

### Usage

```php
use Contributte\Social\Google\Analytics\Campaign;

// Source, medium, campaign
$campaign = new Campaign('newsletter', 'website', 'april13');
$this->link('Card:detail', $campaign->build());

// Source, medium, campaign, term, content
$campaign = new Campaign('newsletter', 'website', 'april13', 'term1', 'content');
$this->link('Product:detail', $campaign->build());

// Factory (same args as previous)
$link = Campaign::create('newsletter', 'website', 'april13');
$this->link('Foto:detail', $link);
```

## Twitter

### TweetButton

#### Settings

| Type   | Field               | Default                   | Setter/Getter | Info                     |
|--------|---------------------|---------------------------|---------------|--------------------------|
| string | `$url`              | NULL                      | yes/yes       |                          |
| string | `$href`             | https://twitter.com/share | yes/yes       |                          |
| string | `$via`              | NULL                      | yes/yes       |                          |
| string | `$text`             | NULL                      | yes/yes       |                          |
| string | `$related`          | NULL                      | yes/yes       |                          |
| string | `$count`            | vertical                  | yes/yes       | none/vertical/horizontal |
| string | `$counturl`         | NULL                      | yes/yes       |                          |
| array  | `$hashtags`         | []                        | yes/yes       |                          |
| string | `$size`             | medium                    | yes/yes       | medium/large             |
| bool   | `$dnt`              | FALSE                     | yes/yes       |                          |
| string | `$lang`             | cs                        | yes/yes       |                          |
| Html   | `$elementPrototype` | a                         | yes/yes       | html prototype           |
| string | `$elementText`      | Tweet                     | yes/yes       |                          |
| array  | `$properties`       | []                        | yes/yes       |                          |

#### Helpers

* `setShareButton($text)`
* `setMentionButton($mention)`
* `setHashtagButton($hashtag)`

#### Factory

##### config.neon

```
services:
    - Contributte\Social\Twitter\ITweetButtonFactory
```

##### Presenter

```php
use Contributte\Social\Twitter\TweetButton;

/**
  * @return TweetButton
  */
protected function createComponentPlusone() {
    $button = new TweetButton();
    $button->setShareButton('www.google.com');
    return $button;
}
```

```php
/** @var Contributte\Social\Twitter\ITweetButtonFactory @inject */
public $twitterFactory;

/**
  * @return TweetButton
  */
protected function createComponentTwitter() {
    $button = $this->twitterFactory->create();
    $button->setShareButton('www.google.com');

    return $button;
}
```

#### Template

##### Render javascript

Place before `</body>` or `</head>`.

`{control twitter:js}`

##### Render button

Button #1: `{control twitter}`

Button #2: `{control twitter, $url}`

Button #3: `{control twitter, 'www.seznam.com'}`
