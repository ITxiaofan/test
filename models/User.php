<?php
namespace models;
use PDO; 
class User extends Model{
    
    public function login($username,$password){

        $sql = "SELECT * FROM users WHERE username= ? AND password=?";
        // var_dump($username,$password);

        $pdo = \libs\Db::make();

        $psm = $pdo->prepare($sql);

        $psm->execute([$username,$password]);

        $data = $psm->fetch(PDO::FETCH_ASSOC);

        // var_dump($data);

        // die();
        if($data){
            $_SESSION['useranme'] = $username;
            $_SESSION['password'] = $password;
            return TRUE;
        }else{
            return FALSE;
        }
        
    }
    public function getAll()
    {
        $stmt =$this->_db->query('SELECT * FROM users');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}