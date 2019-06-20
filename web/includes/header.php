
<header class="fixhead xlarge light">
<?php
echo $html->h('1','CmrFramework');
if(isset($_POST['disc'])){
    $_SESSION['user']=NULL;
    $_SESSION['flash']['danger'] = "deconneter";
    header("Location: index.php");
}
if(!isset($_SESSION['user'])){
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
<?php if(isset($_SESSION['flash'])): ?>
<?php foreach($_SESSION['flash'] as $type => $message): ?>
<div class="small bg-<?= $type; ?>">
	<?= $message; ?>
</div>
<?php endforeach; ?>
<script>
    var t=setTimeout("killPage",30*1000);
function killPage(){
    <?php unset($_SESSION['flash']); ?>
}
function questionComplete(){
    t.clearTimeout();
}
</script>
<?php endif; ?>
