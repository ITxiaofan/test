<?php
namespace models;

use PDO;

class Base
{
    public $pdo;
    public function __constuct(){
        $this->pdo = new PDO("mysql:host='127.0.0.1';dbname='product'", 'root', '123456');
        $this->pdo->exec('SET NAMES utf8');
        
    }
    

   
}
