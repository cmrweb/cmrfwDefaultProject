<?php
var_dump(CONNECT_PATH['local']);
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
        try {
            return $this->pdo = new PDO("mysql:host={$GLOBALS['host']};dbname={$GLOBALS['db']}","{$GLOBALS['user']}","{$GLOBALS['pass']}",[PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION]);
            echo 'connected';
        } catch (Exception $e) {
            echo $e;
        }     
    }
    public function select($select,$from,$where=null)
    {
        if($where){
            $req=$this->pdo->prepare("SELECT $select FROM $from WHERE $where");
            $req->execute();
            return $this->result = $req->fetchAll();
        }else{
            $req=$this->pdo->prepare("SELECT $select FROM $from");
            $req->execute();
            return $this->result = $req->fetchAll();
        }
    }
    public function insert($into,$value,$where=null)
    {
        if($where){
            $req=$this->pdo->prepare("INSERT INTO $into VALUES ($value) WHERE $where");
            $req->execute();
        }else{
            $req=$this->pdo->prepare("INSERT INTO $into VALUES ($value)");
            $req->execute();
        }
    }
}