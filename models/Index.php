<?php
namespace models;
class Index extends Model{
    // 设置这个模型对应的表
    protected $table = 'list';
    // 设置允许接收的字段
    protected $fillable = ['title','audit_status','publisher','update_at','comment'];
    public function __construct(){
        $this->_db = \libs\Db::make();
    }
    public function insert($id){
        
        $stmt = $this->_db->prepare("INSERT INTO Category (id,cat_name) VALUES (?,'?')");
        $stmt->execute([
            $id,
            $_GET['cat_name'],
        ]);
        $data = $stmt->fetchAll();

    }
    public function delete(){
        $stmt = $this->_db->prepare("DELETE FROM list WHERE id=?");
            $stmt->execute([
                $_GET['ID']
            ]);
    }

}