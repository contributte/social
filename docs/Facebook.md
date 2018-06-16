# Social\Facebook

Collection of facebook components for Nette 2.4.0.

## Plugins

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

### Deprecated
| Plugin               	| Source 	| Docs 	|
|----------------------	|--------	|------	|
|     Activity Feed    	| [source](https://github.com/Contributte/social/blob/master/src/Facebook/ActivityFeed/ActivityFeed.php) 	            |  [doc](https://developers.facebook.com/docs/plugins/activity) 	        |
| Recommendations Feed 	| [source](https://github.com/Contributte/social/blob/master/src/Facebook/RecommendationsFeed/RecommendationsFeed.php) 	|  [doc](https://developers.facebook.com/docs/plugins/recommendations) 	    |
|       Like Box       	| [source](https://github.com/Contributte/social/blob/master/src/Facebook/LikeBox/LikeBox.php) 	                        |  [doc](https://developers.facebook.com/docs/plugins/like-box-for-pages) 	|
|       Facepile       	| [source](https://github.com/Contributte/social/blob/master/src/Facebook/Facepile/Facepile.php) 	                    |  [doc](https://developers.facebook.com/docs/plugins/facepile) 	        |

## Usage

### Presenter

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

### Template

You have to display [**JavaScript**](https://developers.facebook.com/docs/javascript) code.

```latte
{control likebutton}
{control script}
```
