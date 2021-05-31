<?php

namespace engine;

use engine\components\Request;
use engine\components\Response;
use engine\components\Router;
use engine\components\Session;

class Application
{
    /**
     * @var $router
     */
    public static $router;

    /**
     * @var $request
     */
    public static $request;

    public static $response;

    public static $session;


    /**
     * Run app
     */
    public static function run()
    {
        self::$request = new Request();
        self::$router = new Router();
        self::$response = new Response();
        self::$session = new Session();

        $controller = self::$router->getController();
        $action = self::$router->getAction();

        $response = (new $controller)->{$action}();
        $response->render();

        self::$session->destroyRequestSession();
    }
}