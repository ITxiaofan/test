<?php
namespace models;
class Category extends Model{
    // 设置这个模型对应的表
    protected $table = 'Category';
    // 设置允许接收的字段
    protected $fillable = ['id','cat_name'];
    public function cat(){
        $data = $this->findAll();
        return $data;
    }

}