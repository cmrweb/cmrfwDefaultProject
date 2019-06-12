<?php
$host=CONNECT_PATH["host"];
$db=CONNECT_PATH["dbname"];
$user=CONNECT_PATH["user"];
$pass=CONNECT_PATH["pass"];
class DB
{

    protected $pdo;
    public $result;
    function __construct()
    {
        $this->pdo = new PDO("mysql:host={$GLOBALS['host']};dbname={$GLOBALS['db']}","{$GLOBALS['user']}","{$GLOBALS['pass']}",[PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION]);            
        return $this->pdo;

    }
    public function select($select,$from,$where=null)
    {       
        $order = preg_replace('/cmr_/','',$from);
        if($where){
            $req=$this->pdo->prepare("SELECT $select FROM $from WHERE $where order by {$order}_id desc");
            $req->execute();
            return $this->result = $req->fetchAll();
        }else{
            $req=$this->pdo->prepare("SELECT $select FROM $from order by {$order}_id desc");
            $req->execute();
            return $this->result = $req->fetchAll();
        }
    }
    public function insert($into,$value,$where=null)
    {
        if($where){
            $req=$this->pdo->prepare("INSERT INTO $into VALUES ($value) WHERE $where");
            $req->execute();
            return $this;            
        }else{
            $req=$this->pdo->prepare("INSERT INTO $into VALUES ($value)");
            $req->execute();
            return $this;        
        }
    }
}