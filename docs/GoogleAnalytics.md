# Google Analytics Campaign Maker

Small utility for creating GA accepted parameters to url.

## Info

* @version 1.2
* @author Milan Felix Sulc <sulcmil@gmail.com>

## Parameters

- source
- medium
- campaign
- term
- content

## Usage

```php
use Minetro\Social\Google\Analytics\Campaign;

// Source, medium, campaign
$campaign = newCampaign('newsletter', 'website', 'april13');
$this->link('Card:detail', $campaign->build());

// Source, medium, campaign, term, content
$campaign = new Campaign('newsletter', 'website', 'april13', 'term1', 'content');
$this->link('Product:detail', $campaign->build());

// Factory (same args as previous)
$link = Campaign::create('newsletter', 'website', 'april13');
$this->link('Foto:detail', $link);
```