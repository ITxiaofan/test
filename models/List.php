<?php
namespace models;
class List_ {

    // 设置这个模型对应的表
    protected $table = 'list';
    // 设置允许接收的字段
    protected $fillable = ['title','audit_status','publisher','update_at','comment'];
    
}