<?php


namespace engine\components;


class Database implements \ArrayAccess
{
    protected $table;

    protected $connection;

    protected $attributes = [];

    public function __construct($attributes = [])
    {
        $this->connection = Pdo::getInstance();
        $this->attributes = $attributes;
        if (!$this->table)
            $this->table = strtolower(basename(static::class)) . 's';
    }

    public function __get($name)
    {
        return $this->attributes[$name] ?? null;
    }

    public function __set($name, $value)
    {
        $this->attributes[$name] = $value;
    }

    public function selectAll($options = '*'): Collection
    {
        $query = sprintf('select %s from %s', $options, $this->table);
        $items = $this->connection->query($query, true);
        return $this->fill($items);
    }

    public function fill(array $items): Collection
    {
        $modelNamespace = static::class;
        return (new Collection($items))->transform(function ($attrs) use ($modelNamespace) {
            return new $modelNamespace($attrs);
        });
    }

    public function save()
    {
        $keys = implode(',', array_keys($this->attributes));
        $values = array_values($this->attributes);
        foreach ($values as $key => $value) {
            $values[$key] = '"' . $value . '"';
        }
        $values = implode(',', $values);

        return $this->connection->query("INSERT INTO {$this->table} ($keys) VALUES ($values)");
    }
    

    public function offsetExists($offset): bool
    {
        return isset($this->attributes[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->attributes[$offset];
    }

    public function offsetSet($offset, $value)
    {
        $this->attributes[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->attributes[$offset]);
    }

}