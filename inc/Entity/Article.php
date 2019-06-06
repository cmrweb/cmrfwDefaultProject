<?php
class Article
{
    public $data;
    private $post_id;
    private $user_id;
    private $title;
    private $post;
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
    public function getPostId(): self
    {
        return $this->data->post_id;
    }
    public function getUserId(): self
    {
        return $this->data->user_id;
    }
    public function getTitle(): self
    {
        return $this->data->title;
    }
    public function getPost(): self
    {
        return $this->data->post;
    }
}
