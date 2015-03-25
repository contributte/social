<?php

namespace Minetro\Social\Facebook;

use ArrayAccess;
use ArrayIterator;
use Countable;
use IteratorAggregate;
use Nette\MemberAccessException;

/**
 * Attributes
 *
 * @author Milan Felix Sulc <sulcmil@gmail.com>
 * @version 3.0
 */
class Attributes implements Countable, ArrayAccess, IteratorAggregate
{

    /** @var array */
    private $attrs = [];

    /** GETTERS/SETTERS *******************************************************/

    /**
     * @param string $name
     * @param string $value
     */
    public function add($name, $value)
    {
        $this->attrs[$name] = $value;
    }

    /**
     * @param string $name
     * @param string $value
     */
    public function data($name, $value)
    {
        $this->attrs["data-$name"] = $value;
    }

    /**
     * @return array
     */
    public function getAttributes()
    {
        return $this->attrs;
    }

    /**
     * @param array $attrs
     */
    public function setAttributes($attrs)
    {
        $this->attrs = $attrs;
    }


    /** COUNTABLE *************************************************************/

    /**
     * @return int
     */
    public function count()
    {
        return count($this->attrs);
    }

    /** ARRAY ACCESS **********************************************************/

    /**
     * @return boolean
     */
    public function offsetExists($offset)
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

    /**
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        $this->attrs[$offset] = $value;
    }

    /**
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->attrs[$offset]);
    }

    /** ARRAY ACCESS **********************************************************/

    /**
     * @return ArrayIterator
     */
    public function getIterator()
    {
        return new ArrayIterator($this->attrs);
    }

    /** MAGIC *****************************************************************/

    function __get($name)
    {
        if ($this->offsetExists($name)) {
            return $this->offsetGet($name);
        } else {
            throw new MemberAccessException("Cannot read attribute $name");
        }
    }

}
