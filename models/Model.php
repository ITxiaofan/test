<?php
namespace models;
use PDO;
class Model{
    protected $_db;
    // 操作的表名
    protected $table;
    // 表单中的数据
    protected $data;
    public function findAll($options = [])
    {
        $_option = [
            'fields' => '*',
            'where' => 1,
            'order_by' => 'id',
            'order_way' => 'desc',
            'per_page'=>15,
        ];
        // 合并用户的配置
        if($options)
        {
            $_option = array_merge($_option, $options);
        }
        /* 翻页*/
        $page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
        $offset = ($page-1)*$_option['per_page'];
        
        $sql = "SELECT {$_option['fields']}
                 FROM {$this->table}
                 WHERE {$_option['where']}
                 ORDER BY {$_option['order_by']}
                 LIMIT $offset,{$_option['per_page']}";

        $stmt = $this->_db->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll( PDO::FETCH_ASSOC );

        /* 获取总的记录数*/
        $stmt = $this->_db->prepare("SELECT COUNT(*) FROM {$this->table} WHERE {$_option['where']}");
        $stmt->execute();
        $count = $stmt->fetch( PDO::FETCH_COLUMN );
        $pageCount = ceil($count/$_option['per_page']);

        $page_str = '';
        if($pageCount>1)
        {
            for($i=1;$i<=$pageCount;$i++)
            {
                $page_str .= '<a href="?page='.$i.'">'.$i.'</a> ';
            }
        }
        return [
            'data' => $data,
            'page' => $page_str,
        ];
    }
    // 接收表单中的数据
    public function fill($data){
        // 判断是否早白名单中
        foreach($data as $k => $v){

            if(!in_array($k,$this->fillable)){

                unset($data[$k]);
            }
        }
        
        $this->data = $data;   
    }

    public function findOne(){
        $stmt = $this->_db->prepare("SELECT * FROM {$this->table} WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetch( \PDO::FETCH_ASSOC );
    }
}
