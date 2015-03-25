# Twitter

## TweetButton

### Info

* @version 1.0
* @author Milan Felix Sulc
* @doc https://dev.twitter.com/web/tweet-button

### Settings

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

### Helpers

* `setShareButton($text)`
* `setMentionButton($mention)`
* `setHashtagButton($hashtag)`

### Factory

```php
use Minetro\Social\Twitter\TweetButton;

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
/** @var Minetro\Social\Twitter\ITweetButtonFactory @inject */
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

### Template

#### Render javascript

Place before `</body>` or `</head>`.

`{control twitter:js}`

#### Render button

Button #1: `{control twitter}`

Button #2: `{control twitter, $url}`

Button #3: `{control twitter, 'www.seznam.com'}`
