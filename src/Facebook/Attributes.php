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

	/**
	 * @param mixed $value
	 */
	public function add(string $name, $value): void
	{
		$this->attrs[$name] = $value;
	}

	/**
	 * @param mixed $value
	 */
	public function data(string $name, $value): void
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

	/**
	 * @param mixed $offset
	 */
	public function offsetExists($offset): bool
	{
		return isset($this->attrs[$offset]);
	}

	/**
	 * @param mixed $offset
	 * @return mixed
	 */
	public function offsetGet($offset)
	{
		return $this->attrs[$offset];
	}

	/**
	 * @param mixed $offset
	 * @param mixed $value
	 */
	public function offsetSet($offset, $value): void
	{
		$this->attrs[$offset] = $value;
	}

	/**
	 * @param mixed $offset
	 */
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
	 * @param mixed $name
	 * @return mixed
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
