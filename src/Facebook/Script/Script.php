<?php declare(strict_types = 1);

namespace Contributte\Social\Facebook\Script;

use Contributte\Social\Facebook\Control;
use Nette\Utils\Html;

class Script extends Control
{

	private string|int|float $appId;

	private string $apiVersion = 'v2.7';

	public function getAppId(): string|int|float
	{
		return $this->appId;
	}

	public function setAppId(string|int|float $appId): void
	{
		$this->appId = $appId;
	}

	public function getApiVersion(): string
	{
		return $this->apiVersion;
	}

	public function setApiVersion(string $apiVersion): void
	{
		$this->apiVersion = $apiVersion;
	}

	public function build(): Html
	{
		return Html::el();
	}

	public function render(): void
	{
		$this->template->setFile(__DIR__ . '/script.latte');
		$this->template->appId = $this->getAppId();
		$this->template->apiVersion = $this->getApiVersion();
		$this->template->render();
	}

}
