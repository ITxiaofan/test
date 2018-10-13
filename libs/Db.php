<?php
namespace libs;
use pdo;
class Db
{
        static $pdo = null;
        static $Db = null;
        function __construct(){
            $config = config('db');

            if($pdo==null){

                self::$pdo = new PDO("mysql:host={$config['host']};dbname={$config['dbname']}",$config['user'],$config['pass']);
                self::$pdo->exec("set names utf-8");
            }
        }
        static function make(){

            if(self::$Db==null){    
                self::$Db = new Db;
            }

            return self::$Db;

        }

        function prepare($sql){
            $psm = self::$pdo->prepare($sql);
            return $psm;

        }

        function exec($sql){
            $data = self::$pdo->exec($sql);

            if($data){
                return true;
            }else{
                return false;
            }
        }

        function query($sql){

            $psm = self::$pdo->query($sql);
            return $psm;
        }

        function delete($sql){

            $data = self::$pdo->delete($sql);

            if($data){
                return true;

            }else{
                return false;
            }
        }

        function update($sql){

            $data = self::$pdo->update($sql);

            if($data){
                return true;

            }else{
                return false;

            }
        }
}


        
