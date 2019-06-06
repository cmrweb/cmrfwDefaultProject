<?php

switch ($url) {
    case '':
    require 'pages/home.php';
    break;

    case 'article':
    require 'pages/article.php';
    break;
    
    case $url[0]=='article' AND !empty($url[1]):
    $id = $url[1];
    require "pages/article.php";
    break;

    default:
     echo 'ERREUR 404';
     break;
}

?>