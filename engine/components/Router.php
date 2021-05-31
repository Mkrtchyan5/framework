<?php

namespace engine\components;

use engine\Application;
use exceptions\RouterException;

class Router
{
    /**
     * @var mixed
     */
    private $routes;

    /**
     * @var $currentRoute
     */
    private $currentRoute;

    /**
     * @var $controller
     */
    private $controller;

    /**
     * @var $action
     */
    private $action;

    /**
     * Router constructor.
     */
    public function __construct()
    {
        $this->routes = require ROOT . 'routes' . DIRECTORY_SEPARATOR . 'web.php';
        $this->detectRouteComponents();
    }

    /**
     * Detect controller and action.
     * @throws RouterException
     */
    private function detectRouteComponents()
    {
        $uri = Application::$request->getUri();
        $this->currentRoute = $this->routes[$uri] ?? false;

        if ($this->currentRoute === null || $this->currentRoute === false || $this->currentRoute === '') {
            http_response_code(404);
            die();
        }

        $this->defineController();
        $this->defineAction();
    }

    /**
     * @throws RouterException
     */
    public function defineAction()
    {
        $this->action = $this->currentRoute[1] ?? null;

        if (! $this->action) {
            throw new RouterException('You may specify controller action.');
        }
    }

    /**
     * @throws RouterException
     */
    public function defineController()
    {
        $this->controller = $this->currentRoute[0] ?? null;

        if (! $this->controller) {
            throw new RouterException('You may specify controller.');
        }
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }
}