
<header class="fixhead xlarge dark">
<?php
echo $html->h('1','CmrFramework');
if(isset($_POST['disc'])){
    $_SESSION['user']=NULL;
    header("Location: index.php");
}
if(!$_SESSION){
echo 
$html->code('nav',
$html->menu([
    'Sign in' => '',
    'Login'=> '' 
],
'primary popupBtn'),
'nav navConn');
    require_once '../'.ROOT_DIR.MOD_DIR.'mod_signin.php';
    require_once '../'.ROOT_DIR.MOD_DIR.'mod_login.php';  
}else{
    $form = $html->formOpen('', 'post') .
    $html->button('submit', 'primary navConn', 'se deconnecter', 'disc') .
    $html->formClose();
    
echo $form;
}
include 'web/module/nav.php';
?>

</header>
<main class="Mtop">

