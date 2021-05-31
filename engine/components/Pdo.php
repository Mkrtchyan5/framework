<?php


namespace engine\components;

class Pdo
{

    private $db;
    static $instance;

    private function __construct()
    {
        $this->db = new \PDO("mysql:host=localhost;dbname=framework", 'root', '');

    }

    /**
     * @return \PDO
     */
    public function getPdo()
    {
        return $this->db;
    }

    /**
     * @return self
     */
    public static function getInstance(): Pdo
    {
        if (!static::$instance) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    public function query($sql, $fetch = false)
    {
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute();
        if ($fetch) {
            $stmt->setFetchMode(\PDO::FETCH_ASSOC);
            return $result = $stmt->fetchAll();
        }
    }
}