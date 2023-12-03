<?php
date_default_timezone_set('Asia/Taipei');
session_start();

class DB
{
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=bquiz";
    protected $pdo;
    protected $table;
    function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dsn, 'root', '');
    }
    function all($where = '', $other = '')
    {
        $sql = "select * from `$this->table` ";
        $sql = $this->sql_all($sql, $where, $other);
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    function find($where){
        $sql = "select * from `$this->table` ";
        if(is_array($where)){
            $tmp = $this->a2s($where);
            $sql.="where ".join(' && ',$tmp);
        }
        elseif(is_numeric($where)){
            $sql.="where `id` = '$where'";

        }
        else{
            echo "錯誤:參數資料型型必須是數字或陣列";
        }
        // return $sql;
        // exit();
        $row=$this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    function save($array){
        if(isset($array['id'])){
            $sql = "update `$this->table` set ";
            if(!empty($array)){
                $tmp = $this->a2s($array);
                        }
                        else{
                            echo "錯誤:請提供需編輯的欄位陣列";
                        }
                        $sql.=join(' , ',$tmp);
                        $sql.=" where `id` = '{$array['id']}'";
        }
        else{
            $sql = "insert into `$this->table` ";
            $cols = "(`".join("`,`",array_keys($array))."`)";
            $vals = "('".join("','",$array)."')";
            $sql.=$cols." VALUES ".$vals;
        }
        //       return $sql;
        // exit();
        return $this->pdo->exec($sql);
    }
    function del($where){
        $sql = "delete from `$this->table` where ";
        if(is_array($where)){
            $tmp = $this->a2s($where);
            $sql.=join(" && ",$tmp);
        }
        elseif(is_numeric($where)){
            $sql.="`id` = '$where'";
        }
        else{
            echo "錯誤:請提供陣列或數字的參數!";
        }
        // return $sql;
        // exit();
        return $this->pdo->exec($sql);
        
    }
    function q($sql){
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    //聚合函式
    function math($math, $col, $where = '', $other = '')
    {
        switch ($math) {
            case 'sum':
                $sql = "select sum(`$col`) from `$this->table`";
                break;
            case 'count':
                $sql = "select count(`$col`) from `$this->table`";
                break;
            case 'max':
                $sql = "select max(`$col`) from `$this->table`";
                break;
            case 'min':
                $sql = "select min(`$col`) from `$this->table`";
                break;
        }
        $sql = $this->sql_all($sql,$where,$other);
        return $this->pdo->query($sql)->fetchcolumn();
    }
    // 常用函式
    private function a2s($where)
    {
        foreach ($where as $key => $val) {
            $tmp[] = "`$key`='$val'";
        }
        return $tmp;
    }
    private function sql_all($sql, $where, $other)
    {
        if (isset($this->table) && !empty($this->table)) {
            if (is_array($where)) {
                if (!empty($where)) {
                    $tmp = $this->a2s($where);
                    $sql .= "where " . join(" && ", $tmp);
                }
            } else {
                $sql .= $where;
            }
            $sql .= $other;
            return $sql;
            // return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC); 
        } else {
            echo "未提供正確資料表";
        }
    }
}
function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

$Que = new DB('que');
// $sAll = $Que->del('3');
// dd($sAll);