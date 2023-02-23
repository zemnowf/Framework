<?php

namespace Fw\Core\Type;

class Dictionary implements \Iterator, \ArrayAccess, \Countable, \JsonSerializable
{

    private int $position = 0;
    private array $dictionary;

    private bool $readonly;

    public function __construct($values, bool $readonly = false)
    {
        $this->dictionary = $values;
        $this->readonly = $readonly;
    }

    public function current()
    {
        return $this->dictionary[$this->position];
    }

    public function next()
    {
        ++$this->position;
    }

    public function key()
    {
        return $this->position;
    }

    public function valid(): bool
    {
        return isset($this->dictionary[$this->position]);
    }

    public function rewind()
    {
        return $this->position;
    }

    public function offsetExists($offset): bool
    {
        return isset($this->dictionary[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->dictionary[$offset] ?? null;
    }

    public function offsetSet($offset, $value)
    {
        if ($this->readonly) {
            return;
        }

        if (is_null($offset)) {
            $this->dictionary[] = $value;
        } else {
            $this->dictionary[$offset] = $value;
        }
    }

    public function offsetUnset($offset)
    {
        if ($this->readonly) {
            return;
        }

        unset($this->dictionary[$offset]);
    }

    public function count(): int
    {
        return count($this->dictionary);
    }

    public function jsonSerialize()
    {
        return $this->dictionary;
    }

    public function get($name)
    {
        return $this->dictionary[$name] ?? null;
    }

    public function set($name, $value)
    {
        if ($this->readonly) {
            return;
        }

        $this->dictionary[$name] = $value;
    }

    public function getValues(): array
    {
        return $this->dictionary;
    }

    public function setValues($values)
    {
        if ($this->readonly) {
            return;
        }

        $this->dictionary = array_merge($this->dictionary, $values);
    }

    public function clear()
    {
        if ($this->readonly) {
            return;
        }

        $this->dictionary = array();
    }
}