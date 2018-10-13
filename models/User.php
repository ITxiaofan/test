<?php
namespace models;
use PDO;
class User extends Base{
    public function login($username,$password){

        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username='?' AND password=?");
        $stmt->execute([
            $username,
            $password => md5($password),
        ]);
        $data = $stmt->fetchAll();
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
        $stmt = self::$pdo->query('SELECT * FROM users');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}