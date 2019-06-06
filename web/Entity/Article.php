<?php
class Article
{
    public $data;

    function __construct($bool=NULL)
    {
        $pdo=new DB;
        $pdo->select("*", "cmr_post",$bool);
        foreach ($pdo->result as $value) {
            $this->data[$value['post_id']] = [
                'post_id' => $value['post_id'],
                'user_id' => $value['user_id'],
                'title' => $value["titre"],
                'post' => $value["post"]
            ];
        }
        return $this->data;
    }
    public function getData():array
    {
        return $this->data;
    }
}
