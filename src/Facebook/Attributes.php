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
	private array $attrs = [];

	public function add(string $name, mixed $value): void
	{
		$this->attrs[$name] = $value;
	}

	public function data(string $name, mixed $value): void
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

	public function count(): int
	{
		return count($this->attrs);
	}

	public function offsetExists(mixed $offset): bool
	{
		return isset($this->attrs[$offset]);
	}

	public function offsetGet(mixed $offset): mixed
	{
		return $this->attrs[$offset];
	}

	public function offsetSet(mixed $offset, mixed $value): void
	{
		$this->attrs[$offset] = $value;
	}

	public function offsetUnset(mixed $offset): void
	{
		unset($this->attrs[$offset]);
	}

	/**
	 * @return ArrayIterator<string, mixed>
	 */
	public function getIterator(): ArrayIterator
	{
		return new ArrayIterator($this->attrs);
	}

	public function __get(string $name): mixed
	{
		if ($this->offsetExists($name)) {
			return $this->offsetGet($name);
		} else {
			throw new MemberAccessException(sprintf('Cannot read attribute %s', $name));
		}
	}

}
