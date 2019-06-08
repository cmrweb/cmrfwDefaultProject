
<header class="fixhead xlarge dark">
<?=
$html->h('1','CmrFramework');
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
include 'web/module/nav.php';
?>

</header>
<main class="Mtop">

