<?php

namespace models;

use engine\Application;
use engine\components\Database;
use engine\components\Pdo;
use engine\components\Pagination;


class Article extends Database
{

    public function createReminder($title, $description, $subject, $full_text)
    {
        $db = Pdo::getInstance();
        $user_id = $_SESSION['user'][0]['id'];
        $db->query("INSERT INTO articles (title,description,subject,full_text,user_id) 
                        VALUES ('$title','$description','$subject','$full_text','$user_id')");

    }

    public function getArticles($limit)
    {
        $pagination = new Pagination();
        $db = Pdo::getInstance();
        $user_id = $_SESSION['user'][0]['id'];
        $start = 0;
        if ($pagination->currentPage() > 1) {
            $start = ($pagination->currentPage() * $limit) - $limit;
        }
        $articles = $db->query("SELECT * FROM articles   WHERE user_id = $user_id LIMIT $start, $limit", true);
        return $articles;
    }


    public function getTotalRecords()
    {
        $db = Pdo::getInstance();
        $user_id = $_SESSION['user'][0]['id'];
        $stmt = $db->query("SELECT COUNT(id) as count FROM articles WHERE user_id = $user_id ", true);
        return $stmt[0]['count'];
    }

    public function getArticleById($id)
    {
        $db = Pdo::getInstance();
        $user_id = $_SESSION['user'][0]['id'];
        $reminders = $db->query("SELECT * FROM articles WHERE id = $id AND user_id = $user_id", true);
        return $reminders;
    }

    public function delete($id)
    {
        $db = Pdo::getInstance();
        $db->query("DELETE FROM articles WHERE id = $id");
    }

    public function update($title, $description, $subject, $full_text,$id)
    {
        $db = Pdo::getInstance();
        $db->query("UPDATE  articles SET title = '$title', description ='$description' 
                                    , subject='$subject' , full_text = '$full_text' WHERE id=$id");
    }
}