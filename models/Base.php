<?php
namespace models;
use PDO;
class Base{
    public static $pdo = null;

    public function __construct(){
        if($this->pdo === null){
            $this->pdo = new PDO("mysql:host='127.0.0.1';dbname='product'", 'root', '123456');
            $this->pdo->exec("SET NAMES utf8");
        }
    }
}