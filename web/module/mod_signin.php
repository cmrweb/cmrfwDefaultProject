<?php
$msg = "";
if (isset($_POST['send'])) {
    if (!empty($_POST['username_Sign']) && !empty($_POST['password_Sign'])) {
    if(preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/",$_POST['password_Sign'])){ 
        $name = $_POST['username_Sign'];
        $pass = password_hash($_POST['password_Sign'], PASSWORD_BCRYPT);
        $user = new User("username='{$name}'");
        if ($user->getData()) {
            $msg= 'Ce nom est deja pris !!!';
        } else {

            try {
                $db = new DB;
                $db->insert('cmr_user(username,password)', "'{$name}','{$pass}'");
                $msg = "Bienvenu(e)!";
            } catch (Exception $e) {
                $msg= $e->getMessage();
            }
        }
    }else{
        $msg ="le mot de passe doit contenir au moins 8 character, une Majuscule et un chiffre";
    }
    } else {
        $msg = "heu! tu ne comprend pas ???";
    }
}


$form = $html->h('1', 'Sign in Module') .
    $html->formOpen('', 'post', 'medium dark') .
    $html->input('text', 'username_Sign', 'Nom d\'utilisateur', 'entrer votre nom') .
    $html->input('password', 'password_Sign', 'mot de passe') .
    $html->button('submit', 'primary center', 's\'inscrire', 'send') .
    $html->formClose() .
    $html->p($msg);
echo $form;