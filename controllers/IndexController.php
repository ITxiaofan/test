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
        $data = $model->insert();


        view("/Product/insert");
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