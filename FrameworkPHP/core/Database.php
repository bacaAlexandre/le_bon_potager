<?php

class Database
{
    protected $pdo = false;

    public function __construct() {

        $host = getenv('DB_HOST') !== false ? getenv('DB_HOST') : 'localhost';

        $user = getenv('DB_USERNAME') !== false ? getenv('DB_USERNAME') : 'root';

        $password = getenv('DB_PASSWORD') !== false ? getenv('DB_PASSWORD') : '';

        $dbname = getenv('DB_NAME') !== false ? getenv('DB_NAME') : '';

        $port = getenv('DB_PORT') !== false ? getenv('DB_PORT') : '3306';

        $charset = getenv('DB_CHARSET') !== false ? getenv('DB_CHARSET') : 'utf8';;



        $this->pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset;port=$port",$user,$password) or die('Database connection error');

        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function query($data) {

        try {

            return $this->pdo->query($data)->fetchAll();
        }
        catch (PDOException $e) {
            //Log::logWrite($e->getMessage());
            return false;
        }

    }

    public function getFirst($data){

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
        }
    }

    public function getLastInsertId() {
        return $this->pdo->lastInsertId();
    }
}