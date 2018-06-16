<?php declare(strict_types = 1);

namespace Contributte\Social\Google\PlusOne;

/**
 * Google +1 component factory interface
 */
interface IPlusOneFactory
{

	public function create(): PlusOne;

}
