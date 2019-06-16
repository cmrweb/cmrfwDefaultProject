<?php

switch ($url) {
    case '':
    require 'web/pages/home.php';
    break;

    case $url[0]=='article'AND empty($url[1]):
    require 'web/pages/article.php';
    break;
    
    case $url[0]=='article' AND !empty($url[1]):
    $id = $url[1];
    require "web/pages/article.php";
    break;

    case $url[0]=='param.json' AND empty($url[1]):
    require 'TU CHERCHE QUOI??';
    break;

    default:
     echo 'ERREUR 404';
     break;
}
?>