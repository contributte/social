# Google Analytics Campaign Maker

Small utility for creating GA accepted parameters to url.

## Parameters

- source
- medium
- campaign
- term
- content

## Usage

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
