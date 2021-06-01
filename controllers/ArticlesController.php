<?php


namespace controllers;


use engine\Application;
use engine\components\Router;
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
            $pages = $page->getPaginationNumbers($limit, $article);
            return (new View('article.php', ['articles' => $articles, 'pages' => $pages]));
        }
        return Application::$response->redirect('/login');

    }


    public function reminder()
    {
        $session = Application::$session;
        if ($session->get('user')) {
            return (new View('reminder.php'));
        }
        return Application::$response->redirect('/login');
    }


    public function edit()
    {

    }


    public function view()
    {
        $session = Application::$session;
        if ($session->get('user')) {
            $id = Application::$request->get('id');
            $article = (new Article())->getArticleById($id);
            if (!$id || !$article) {
                http_response_code(404);
                die();
            }
            return (new View('reminders.php', ['article' => $article[0]]));
        }
        return Application::$response->redirect('/login');
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

    public function delete()
    {
        $session = Application::$session;
        if ($session->get('user')) {
            $id = Application::$request->get('id');
            $model = new Article();
            $article = $model->getArticleById($id);
            if ($article){
                $model->delete($id);
                return Application::$response->redirect('/articles');
            }
        }
        return Application::$response->redirect('/login');
    }

}