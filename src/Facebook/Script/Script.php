<?php declare(strict_types = 1);

namespace Contributte\Social\Facebook\Script;

use Contributte\Social\Facebook\Control;
use Nette\Utils\Html;

/**
 * Script control
 */
class Script extends Control
{

	/** @var int */
	private $appId;

	/** @var string */
	private $apiVersion = 'v2.7';

	/** GETTERS/SETTERS *******************************************************/

	public function getAppId(): int
	{
		return $this->appId;
	}

	/**
	 * @param string|float $appId
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
		$this->template->setFile(dirname(__FILE__) . '/script.latte');
		$this->template->appId = $this->getAppId();
		$this->template->apiVersion = $this->getApiVersion();
		$this->template->render();
	}

}
