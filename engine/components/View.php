<?php


namespace engine\components;


class View
{
    private $path;
    /**
     * @var array
     */
    private $data;

    /**
     * View constructor.
     * @param $path
     * @param array $data
     */
    public function __construct($path, $data = [])
    {
        $this->path = $path;
        $this->data = $data;
    }

    /**
     * Render content.
     */
    public function render()
    {
        extract($this->data);
        include ROOT . 'views' . DIRECTORY_SEPARATOR . $this->path;
    }
}