<?php


namespace engine\components;


class Session
{
    public function __construct()
    {
        $this->start();
    }


    public function destroyRequestSession()
    {
        unset($_SESSION['request']);
    }

    private function start()
    {
        session_start();
    }

    public function destroy()
    {
        session_destroy();
    }

    public function get($key)
    {
        return $_SESSION[$key] ?? null;
    }

    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function flash($key, $value)
    {
        $_SESSION['request'][$key] = $value;
    }

    public function forget($key)
    {
        unset($_SESSION[$key]);
    }

}