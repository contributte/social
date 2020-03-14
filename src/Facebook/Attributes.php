<?php declare(strict_types = 1);

namespace Contributte\Social\Facebook;

use ArrayAccess;
use ArrayIterator;
use Countable;
use IteratorAggregate;
use Nette\MemberAccessException;

/**
 * Attributes
 *
 * @phpstan-implements ArrayAccess<string, mixed>
 * @phpstan-implements IteratorAggregate<string, mixed>
 */
class Attributes implements Countable, ArrayAccess, IteratorAggregate
{

	/** @var array<string, mixed> */
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
	 * @return array<string, mixed>
	 */
	public function getAttributes(): array
	{
		return $this->attrs;
	}

	/**
	 * @param array<string, mixed> $attrs
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

	/**
	 * @todo remove phpcsSuppress after upgrade to slevomat/coding-standard 6
	 * @phpcsSuppress SlevomatCodingStandard.TypeHints.TypeHintDeclaration.UselessReturnAnnotation
	 * @return ArrayIterator<string, mixed>
	 */
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
