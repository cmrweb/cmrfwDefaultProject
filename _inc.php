<?php
session_start();
use cmr\html\Html;

require 'class/Form.php';
require 'class/Html.php';
require 'class/DB.php';
require 'inc/Entity/Article.php';
$url="";
if(isset($_GET['url'])){
    $url=explode('/',$_GET['url']);
}
//var_dump($url);
