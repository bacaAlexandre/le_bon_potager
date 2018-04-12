<?php

require CONFIG_PATH . "database.php";

class Database
{

    protected $pdo = false;

    public function __construct()
    {
        $host = defined('DB_HOST') ? DB_HOST : 'localhost';
        $user = defined('DB_USERNAME') ? DB_USERNAME : 'root';
        $password = defined('DB_PASSWORD') ? DB_PASSWORD : '';
        $dbname = defined('DB_NAME') ? DB_NAME : '';
        $port = defined('DB_PORT') ? DB_PORT : '3306';
        $charset = defined('DB_CHARSET') ? DB_CHARSET : 'utf8';;

        $this->pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset;port=$port",$user,$password) or die('Database connection error');
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function query($data)
    {
        try {
            return $this->pdo->query($data)->fetchAll();
        }
        catch (PDOException $e) {
            //Log::logWrite($e->getMessage());
            return false;
        }
    }

    public function getFirst($data)
    {
        try {
            return $this->pdo->query($data)->fetch();
        }
        catch (PDOException $e) {
            //Log::logWrite($e->getMessage());
            return false;
        }
    }

    public function execute($data)
    {
        $req = $this->pdo->prepare($data);
        try {
            return $req->execute();
        }
        catch (PDOException $e) {
            //Log::logWrite($e->getMessage());
            return false;
        }
    }

    public function getLastInsertId()
    {
        return $this->pdo->lastInsertId();
    }
}