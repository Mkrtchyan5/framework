<?php

namespace controllers;

use engine\Application;
use engine\components\Database;
use engine\components\View;
use models\Article;

class HomeController
{
    /**
     * @return View
     */
    public function index()
    {
        $session = Application::$session;
        if ($session->get('user')) {
            return Application::$response->redirect('/articles');
        } else {
            return (new View('home.php'));
        }
    }
}