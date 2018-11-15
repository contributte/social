<?php declare(strict_types = 1);

namespace Contributte\Social\Facebook\Script;

use Contributte\Social\Facebook\Control;
use Nette\Utils\Html;

/**
 * Script control
 */
class Script extends Control
{

	/** @var string|int|float */
	private $appId;

	/** @var string */
	private $apiVersion = 'v2.7';

	/** GETTERS/SETTERS *******************************************************/

	/**
	 * @return string|int|float
	 */
	public function getAppId()
	{
		return $this->appId;
	}

	/**
	 * @param string|int|float $appId
	 */
	public function setAppId($appId): void
	{
		$this->appId = $appId;
	}

	public function getApiVersion(): string
	{
		return $this->apiVersion;
	}

	/**
	 * @param string $apiVersion
	 */
	public function setApiVersion($apiVersion): void
	{
		$this->apiVersion = $apiVersion;
	}

	/** API *******************************************************************/

	public function build(): Html
	{
		return Html::el();
	}

	/** RENDER ****************************************************************/

	public function render(): void
	{
		$this->template->setFile(__DIR__ . '/script.latte');
		$this->template->appId = $this->getAppId();
		$this->template->apiVersion = $this->getApiVersion();
		$this->template->render();
	}

}
