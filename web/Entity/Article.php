<?php
class Article
{
    private $data;
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
            $this->post_id[] = $value['post_id'];
            $this->user_id[] = $value['user_id'];
            $this->title[] = $value['titre'];
            $this->post[] = $value['post'];
        }
        
        return $this->data;
    }
    public function getData():array
    {
        return $this->data;
    }
    public function getPostId():array
    {
        return $this->post_id;
    }
    public function getUserId():array
    {
        return $this->user_id;
    }
    public function getTitle():array
    {
        return $this->title;
    }
    public function getPost():array
    {
        return $this->post;
    }

}
