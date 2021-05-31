<?php


namespace engine\components;


class Collection implements \IteratorAggregate, \ArrayAccess
{
    protected $items = [];

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * @param \Closure $closure
     * @return $this
     */
    public function transform(\Closure $closure): Collection
    {
        foreach ($this->items as $key => $attrs) {
            $this->items[$key] = $closure($attrs);
        }

        return $this;
    }

    /**
     * @return \ArrayIterator
     */
    public function getIterator(): \ArrayIterator
    {
        return new \ArrayIterator($this->items);
    }

    public function offsetExists($offset): bool
    {
        return isset($this->items[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->items[$offset];
    }

    public function offsetSet($offset, $value)
    {
        $this->items[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->items[$offset]);
    }
}