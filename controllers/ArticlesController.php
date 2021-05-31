<?php


namespace controllers;


use engine\Application;
use engine\components\View;
use engine\components\Pagination;
use models\Article;
use models\User;

class ArticlesController
{
    /**
     * @return View
     */
    public function index()
    {
        $session = Application::$session;
        if ($session->get('user')) {
            $article = new Article();
            $page = new Pagination();
            $limit = 5;
            $articles = $article->getArticles($limit);
            $pages = $page->getPaginationNumbers($limit,$article);
            return (new View('article.php', ['articles' => $articles, 'pages' => $pages]));
        } else {
            return Application::$response->redirect('/login');
        }
    }


    public function reminder()
    {
        $session = Application::$session;
        if ($session->get('user')) {
            return (new View('reminder.php'));
        } else {
            return Application::$response->redirect('/login');
        }
    }

    public function create()
    {
        $data = Application::$request->only(['title', 'description', 'subject', 'full_text']);
        $model = new Article($data);
        if (Application::$request->post('title') != "" && Application::$request->post('description') != ""
            && Application::$request->post('subject') != "" && Application::$request->post('full_text') != "") {
            $model->createReminder($model->title, $model->description, $model->subject, $model->full_text);
            return Application::$response->redirect('/articles');
        } else {
            $session = Application::$session;
            $session->set('error', 'Your Data Is Empty');
            return Application::$response->redirect('/add-reminder');
        }
    }

}