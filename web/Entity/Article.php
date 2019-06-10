<?php
class Article
{
    private $data;
    private $post_id;
    private $parent_id;
    private $user_id;
    private $title;
    private $post;
    private $img;
    function __construct($bool=NULL)
    {
        $pdo=new DB;
        $pdo->select("*", "cmr_post",$bool);
        foreach ($pdo->result as $value) {
            $this->data[$value['post_id']] = [
                'post_id' => $value['post_id'],
                'parent_id' => $value['parent_id'],
                'user_id' => $value['user_id'],
                'title' => $value["titre"],
                'post' => $value["post"],
                'img' => $value["img"]
            ];
            $this->post_id[] = $value['post_id'];
            $this->parent_id[] = $value['parent_id'];
            $this->user_id[] = $value['user_id'];
            $this->title[] = $value['titre'];
            $this->post[] = $value['post'];
            $this->img[] = $value['img'];
        }
        
        return $this->data;
    }
    public function getData():?array
    {
        return $this->data;
    }
    public function getPostId():array
    {
        return $this->post_id;
    }
    public function getParentId():array
    {
        return $this->parent_id;
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

    public function getImg():array
    {
        return $this->img;
    }
}
