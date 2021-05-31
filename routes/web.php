<?php

use controllers\LoginController;
use controllers\HomeController;
use controllers\ArticlesController;
use controllers\RegisterController;

return [
    '/' => [HomeController::class, 'index'],
    '/articles' => [ArticlesController::class, 'index'],
    '/login' => [LoginController::class, 'index'],
    '/login/auth' => [LoginController::class, 'auth'],
    '/register' => [RegisterController::class, 'index',],
    '/register/store' => [RegisterController::class, 'store',],
    '/logout' => [LoginController::class, 'logout',],
    '/add-reminder' => [ArticlesController::class, 'reminder',],
    '/create' => [ArticlesController::class, 'create',],
];
