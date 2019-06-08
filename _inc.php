<?php
session_start();
use cmr\html\Html;
define('ROOT_DIR', '/cmrfwDefaultProject');
define('CSS_DIR', '/asset/css/');
define('JS_DIR', '/asset/js/');
define('IMG_DIR', '/asset/img/');
define('MOD_DIR', '/web/module/');
define('PAGES_DIR', '/web/pages/');
require 'lib/Form.php';
require 'lib/Html.php';
require 'lib/DB.php';
require 'lib/Autoload.php';
Autoloader::register(); 
$url="";
if(isset($_GET['url'])){
    $url=explode('/',$_GET['url']);
}
