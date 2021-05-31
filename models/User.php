<?php

namespace models;

use engine\components\Database;
use engine\components\Pdo;

class User extends Database
{
    public function createUser($name, $surname, $username, $password)
    {
        $db = Pdo::getInstance();
        $db->query("INSERT INTO users (name,surname,username,password) 
                        VALUES ('$name','$surname','$username','$password')");
    }

    public function getUser($username, $password)
    {
        $db = Pdo::getInstance();
        $result = $db->query("SELECT * FROM users WHERE username = '$username' AND
                                                            password = '$password'", true);
        return $result;
    }

    public function usernameValid($username)
    {
        $db = Pdo::getInstance();
        $res = $db->query("SELECT * FROM users WHERE username = '$username'", true);
        return $res;
    }


}