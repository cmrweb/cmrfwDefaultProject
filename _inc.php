<?php
session_start();
use cmr\html\Html;
require 'lib/Form.php';
require 'lib/Html.php';
require 'lib/DB.php';
require 'web/Entity/Article.php';
$url="";
if(isset($_GET['url'])){
    $url=explode('/',$_GET['url']);
}
//var_dump($url);
