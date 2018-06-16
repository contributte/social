<?php declare(strict_types = 1);

namespace Contributte\Social\Google\Analytics\Campaign;

use InvalidArgumentException;

/**
 * @see http://support.google.com/bin/answer.py?hl=cs&answer=1033867&rd=1
 */
class Campaign
{

	/** GA UTM FIELDS  */
	public const UTM_SOURCE = 'utm_source';
	public const UTM_MEDIUM = 'utm_medium';
	public const UTM_CAMPAIGN = 'utm_campaign';
	public const UTM_TERM = 'utm_term';
	public const UTM_CONTENT = 'utm_content';

	/**
	 * Campaign Source (utm_source)
	 * Use utm_source to identify a search engine, newsletter name, or other source.
	 *
	 * @var string
	 * @required
	 */
	private $source;

	/**
	 * Campaign Medium (utm_medium)
	 * Use utm_medium to identify a medium such as email or cost-per- click.
	 *
	 * @var string
	 * @required
	 */
	private $medium;

	/**
	 * Campaign Name (utm_campaign)
	 * Used for keyword analysis. Use utm_campaign to identify a specific product promotion or strategic campaign.
	 *
	 * @var string
	 * @required
	 */
	private $campaign;

	/**
	 * Campaign Term (utm_term)
	 * Used for paid search. Use utm_term to note the keywords for this ad.
	 *
	 * @var string
	 */
	private $term;

	/**
	 * Campaign Content (utm_content)
	 * Used for A/B testing and content-targeted ads. Use utm_content to differentiate ads or links
	 * that point to the same URL.
	 *
	 * @var string
	 */
	private $content;

	public function __construct(string $source, string $medium, string $campaign, ?string $term = null, ?string $content = null)
	{
		// Validate source & medium * campaign
		if (empty($source)) {
			throw new InvalidArgumentException('GA: UTM parameter source is not filled correctly!');
		}
		if (empty($medium)) {
			throw new InvalidArgumentException('GA: UTM parameter medium is not filled correctly!');
		}
		if (empty($campaign)) {
			throw new InvalidArgumentException('GA: UTM parameter campaign is not filled correctly!');
		}

		$this->campaign = $campaign;
		$this->content = $content;
		$this->medium = $medium;
		$this->source = $source;
		$this->term = $term;
	}

	/** GETTERS/SETTERS *******************************************************/

	/**
	 * @param string $campaign
	 */
	public function setCampaign($campaign): void
	{
		$this->campaign = $campaign;
	}

	public function getCampaign(): string
	{
		return $this->campaign;
	}

	/**
	 * @param string $content
	 */
	public function setContent($content): void
	{
		$this->content = $content;
	}

	public function getContent(): string
	{
		return $this->content;
	}

	/**
	 * @param string $medium
	 */
	public function setMedium($medium): void
	{
		$this->medium = $medium;
	}

	public function getMedium(): string
	{
		return $this->medium;
	}

	/**
	 * @param string $source
	 */
	public function setSource($source): void
	{
		$this->source = $source;
	}

	public function getSource(): string
	{
		return $this->source;
	}

	/**
	 * @param string $term
	 */
	public function setTerm($term): void
	{
		$this->term = $term;
	}

	public function getTerm(): string
	{
		return $this->term;
	}

	/** API *******************************************************************/

	/**
	 * @return mixed[] UTM arguments
	 */
	public function build(): array
	{
		// Assign required parameters
		$args = [];
		$args[self::UTM_SOURCE] = $this->source;
		$args[self::UTM_MEDIUM] = $this->medium;
		$args[self::UTM_CAMPAIGN] = $this->campaign;

		// Assign optinal parameters [if they filled]
		if ($this->term !== null) $args[self::UTM_TERM] = $this->term;
		if ($this->content !== null) $args[self::UTM_CONTENT] = $this->content;

		// Returns arguments
		return $args;
	}

	/** FACTORY ***************************************************************/

	/**
	 * @return mixed[] UTM arguments
	 */
	public static function create(string $source, string $medium, string $campaign, ?string $term = null, ?string $content = null): array
	{
		$app = new Campaign($source, $medium, $campaign, $term, $content);

		return $app->build();
	}

}
