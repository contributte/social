# Social\Facebook

Collection of facebook components override for Nette 2.2.0-2.3.0.

## Info

* @version 3.0
* @author Milan Felix Sulc <sulcmil@gmail.com>
* @doc https://developers.facebook.com/docs/plugins

## Plugins

| Plugin               	| Source 	| Docs 	|
|----------------------	|--------	|------	|
|      Like Button     	| [source](https://github.com/minetro/social/blob/master/src/Social/Facebook/LikeButton/LikeButton.php) 	                |  [doc](https://developers.facebook.com/docs/plugins/like-button) 	        |
|     Share Button     	| [source](https://github.com/minetro/social/blob/master/src/Social/Facebook/ShareButton/ShareButton.php) 	                |  [doc](https://developers.facebook.com/docs/plugins/share-button)         |
|      Send Button     	| [source](https://github.com/minetro/social/blob/master/src/Social/Facebook/SendButton/SendButton.php) 	                |  [doc](https://developers.facebook.com/docs/plugins/send-button) 	        |
|    Embedded Posts    	| [source](https://github.com/minetro/social/blob/master/src/Social/Facebook/EmbeddedPosts/EmbeddedPosts.php)               |  [doc](https://developers.facebook.com/docs/plugins/embedded-posts) 	    |
|    Embedded Videos   	| [source](https://github.com/minetro/social/blob/master/src/Social/Facebook/EmbeddedVideos/EmbeddedVideos.php)             |  [doc](https://developers.facebook.com/docs/plugins/embedded-videos) 	    |
|     Follow Button    	| [source](https://github.com/minetro/social/blob/master/src/Social/Facebook/FollowButton/FollowButton.php) 	            |  [doc](https://developers.facebook.com/docs/plugins/follow-button) 	    |
|       Comments       	| [source](https://github.com/minetro/social/blob/master/src/Social/Facebook/Comments/Comments.php) 	                    |  [doc](https://developers.facebook.com/docs/plugins/comments) 	        |
|       Page Plugin     | [source](https://github.com/minetro/social/blob/master/src/Social/Facebook/PagePlugin/PagePlugin.php) 	                |  [doc](https://developers.facebook.com/docs/plugins/page-plugin) 	        |

### Deprecated
| Plugin               	| Source 	| Docs 	|
|----------------------	|--------	|------	|
|     Activity Feed    	| [source](https://github.com/minetro/social/blob/master/src/Social/Facebook/ActivityFeed/ActivityFeed.php) 	            |  [doc](https://developers.facebook.com/docs/plugins/activity) 	        |
| Recommendations Feed 	| [source](https://github.com/minetro/social/blob/master/src/Social/Facebook/RecommendationsFeed/RecommendationsFeed.php) 	|  [doc](https://developers.facebook.com/docs/plugins/recommendations) 	    |
|       Like Box       	| [source](https://github.com/minetro/social/blob/master/src/Social/Facebook/LikeBox/LikeBox.php) 	                        |  [doc](https://developers.facebook.com/docs/plugins/like-box-for-pages) 	|
|       Facepile       	| [source](https://github.com/minetro/social/blob/master/src/Social/Facebook/Facepile/Facepile.php) 	                    |  [doc](https://developers.facebook.com/docs/plugins/facepile) 	        |

## Usage

### Presenter

```php
use Minetro\Social\Facebook\LikeButton;
use Minetro\Social\Facebook\Script;

/**
 * @return LikeButton
 */
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

/**
 * @return Script
 */
protected function createComponentScript()
{
    return new Script();
}
```

### Template

You have to display [**JavaScript**](https://developers.facebook.com/docs/javascript) code.

```latte
{control likebutton}
{control script}
```