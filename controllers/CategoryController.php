<?php
namespace controllers;
use models\Catrgory;
class CategoryController{
    public function cate(){
        $model = new Category;
        $data = $model->findAll();
        view("/Protect/edit");
    }
}