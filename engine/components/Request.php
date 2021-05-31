<?php


namespace engine\components;


class Request
{
    /**
     * @var array
     */
    private $server;

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->server = $_SERVER;
    }

    /**
     * Get server uri.
     * @return mixed
     */
    public function getUri()
    {
        return strtok($_SERVER["REQUEST_URI"], '?');
    }

    public function get($key)
    {
        return $_GET[$key] ?? null;
    }

    public function post($key)
    {
        return $_POST[$key] ?? null;
    }
    
    public function only(array $attributes)
    {
        $result = [];
        foreach ($attributes as $key) {
            if (isset($this->all()[$key])) {
                $result[$key] = $this->all()[$key];
            }
        }

        return $result;
    }

    public function all()
    {
        $attributes = $_GET;
        return array_merge($attributes, $_POST);
    }
}