<?php


namespace controllers;


use engine\Application;
use engine\components\Database;
use engine\components\View;
use models\Article;
use models\User;

class LoginController
{
    public function index()
    {
        $session = Application::$session;
        if ($session->get('user')) {
            return Application::$response->redirect('/articles');
        } else {
            return (new View('../views/auth/login.php'));
        }
    }

    public function auth()
    {
        $data = Application::$request->only(['username', 'password']);
        $model = new User($data);
        $username = Application::$request->post('username');
        $password = Application::$request->post('password');
        if ($username != "" && $password != "") {
            $model->password = md5($password);
            if ($model->getUser($model->username, $model->password)) {
                $session = Application::$session;
                $session->set('user', $model->getUser($model->username, $model->password));
                return Application::$response->redirect('/articles');
            } else {
                $session = Application::$session;
                $session->set('error', 'Wrong username or password');
                return Application::$response->redirect('/login');
            }
        } else {
            $session = Application::$session;
            $session->set('error', 'Username or password are empty');
            return Application::$response->redirect('/login');
        }
    }

    public function logout()
    {
        $session = Application::$session;
        if ($session->get('user')) {
            $session->destroy();
            return (new View('home.php'));
        }
        return Application::$response->redirect('/login');
    }

}