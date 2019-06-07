<?php
echo $html->h('1','Welcome Home','large');
echo 
$html->code('nav',
$html->menu([
    'Sign in' => '',
    'Login'=> '' 
],
'gold'),
'nav navrad');

require_once '../'.ROOT_DIR.MOD_DIR.'mod_signin.php';
require_once '../'.ROOT_DIR.MOD_DIR.'mod_login.php';


//var_dump($user->getData());


