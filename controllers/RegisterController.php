<?php


namespace controllers;


use engine\Application;
use engine\components\View;
use models\Article;
use models\User;

class RegisterController
{
    public function index()
    {
        $session = Application::$session;
        if ($session->get('user')) {
            return Application::$response->redirect('/articles');
        } else {
            return (new View('../views/auth/register.php'));
        }
    }

    public function store()
    {
        $data = Application::$request->only(['name', 'surname', 'username', 'password']);
        $model = new User($data);
        $password = Application::$request->post('password');
        $username = Application::$request->post('username');
        if (Application::$request->post('name') != "" && Application::$request->post('surname') != "" &&
            Application::$request->post('username') != "" && Application::$request->post('password') != "" &&
            $password === Application::$request->post('confirm')) {
            if ($model->usernameValid($username)) {
                $session = Application::$session;
                $session->set('error', 'Username is already busse');
                return Application::$response->redirect('/register');
            } else {
                $model->password = md5($password);
                $model->save();
                return Application::$response->redirect('/login');
            }
        } else {
            $session = Application::$session;
            $session->set('error', 'Your Data Is Empty');
            return Application::$response->redirect('/register');
        }
    }
}