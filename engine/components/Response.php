<?php


namespace engine\components;


class Response
{
    /**
     * @param $url
     */
    public function redirect($url)
    {
        header('Location: '.$url);
        die;
    }
}