<?php
namespace models;
class Index extends Model{
    // 设置这个模型对应的表
    protected $table = 'list';
    // 设置允许接收的字段
    protected $fillable = ['title','audit_status','publisher','update_at','comment'];
    public function insert(){
        $pdo = \libs\Db::make();
        $psm = $pdo->prepare("SELECT * FROM list");
        
        $psm->execute();
        $data = $psm->fetchAll();
        return $data;
    }
    public function delete(){
        $psm = $pdo->prepare("DELETE FROM list WHERE id=?");
            $psm->execute([
                $_GET['id']
            ]);
    }

}