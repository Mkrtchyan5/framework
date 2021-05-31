<?php


namespace engine\components;


use engine\Application;
use models\Article;

class Pagination
{

    public function currentPage()
    {
        return Application::$request->get('page') ?? 1;
    }

    public function getPaginationNumbers($limit, Database $model)
    {
        return ceil(($model)->getTotalRecords() / $limit);
    }
}