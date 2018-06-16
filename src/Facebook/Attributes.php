<?php declare(strict_types = 1);

namespace Contributte\Social\Facebook;

use ArrayAccess;
use ArrayIterator;
use Countable;
use IteratorAggregate;
use Nette\MemberAccessException;

/**
 * Attributes
 */
class Attributes implements Countable, ArrayAccess, IteratorAggregate
{

	/** @var mixed[] */
	private $attrs = [];

	/** GETTERS/SETTERS *******************************************************/

	public function add(string $name, string $value): void
	{
		$this->attrs[$name] = $value;
	}

	public function data(string $name, string $value): void
	{
		$this->attrs['data-' . $name] = $value;
	}

	/**
	 * @return mixed[]
	 */
	public function getAttributes(): array
	{
		return $this->attrs;
	}

	/**
	 * @param mixed[] $attrs
	 */
	public function setAttributes(array $attrs): void
	{
		$this->attrs = $attrs;
	}

	/** COUNTABLE *************************************************************/

	public function count(): int
	{
		return count($this->attrs);
	}

	/** ARRAY ACCESS **********************************************************/

	public function offsetExists($offset): bool
	{
		return isset($this->attrs[$offset]);
	}

	/**
	 * @return mixed
	 */
	public function offsetGet($offset)
	{
		return $this->attrs[$offset];
	}

	public function offsetSet($offset, $value): void
	{
		$this->attrs[$offset] = $value;
	}

	public function offsetUnset($offset): void
	{
		unset($this->attrs[$offset]);
	}

	/** ARRAY ACCESS **********************************************************/

	public function getIterator(): ArrayIterator
	{
		return new ArrayIterator($this->attrs);
	}

	/** MAGIC *****************************************************************/

	/**
	 * @phpcsSuppress SlevomatCodingStandard.TypeHints.TypeHintDeclaration.MissingParameterTypeHint
	 * @phpcsSuppress SlevomatCodingStandard.TypeHints.TypeHintDeclaration.MissingReturnTypeHint
	 */
	public function __get($name)
	{
		if ($this->offsetExists($name)) {
			return $this->offsetGet($name);
		} else {
			throw new MemberAccessException(sprintf('Cannot read attribute %s', $name));
		}
	}

}
