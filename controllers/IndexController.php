<?php
namespace controllers;
use models\Index;
class IndexController{
    public function index(){
        
        view("/Product/index");
    }
    public function design(){
        $page = new Index;
        // $data = $page->findAll();
        // var_dump($data);
        // exit;
        view("/Product/design");
    }
    public function insert(){
        $model = new Index;
        $stmt = $this->_db->prepare("SELECT * FROM list");
        $stmt->execute();
        $data = $stmt->fetchAll();

        var_dump($stmt);
        exit;
        // $stmt = $this->_db->preppare('INSERT INTO list()')SELECT b.id FROM Category a LEFT JOIN list b ON b.id=a.cat_name
        // $stmt = $model->findAll();

        view("/Product/insert",$data);
    }
    public function edit(){
        $model = new Index;
        $data = $model->findOne($_GET['id']);
        $catModel = new \models\Category;

        $catData = $catModel->cat();
        $catId == $model->
        view("/Product/edit");
    }
    public function update(){

    }
    public function delete(){
        $model = new Index;
        $model->delete($_GET['id']);
        view("/Product/design");
    }
    
}