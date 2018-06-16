<?php declare(strict_types = 1);

namespace Contributte\Social\Twitter\TweetButton;

/**
 * Twitter > tweet button factory interface
 */
interface ITweetButtonFactory
{

	public function create(): TweetButton;

}
