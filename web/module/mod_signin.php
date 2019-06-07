<?php
$msg = "";
if (isset($_POST['send'])) {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $name = $_POST['username'];
        $pass = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $user = new User("username='{$name}'");
        if ($user->getData()) {
            $msg= 'Ce nom est deja pris !!!';
        } else {

            try {
                $db = new DB;
                $db->insert('cmr_user(username,password)', "'{$name}','{$pass}'");
                $msg = "Done!";
            } catch (Exception $e) {
                $msg= $e->getMessage();
            }
        }
    } else {
        $msg = "heu! tu ne comprend pas ???";
    }
}


$form = $html->h('1', 'Signin Module') .
    $html->formOpen('', 'post', 'large dark') .
    $html->input('text', 'username', 'Nom d\'utilisateur', 'entrer votre nom') .
    $html->input('password', 'password', 'mot de passe') .
    $html->button('submit', 'primary center', 's\'inscrire', 'send') .
    $html->formClose() .
    $html->p($msg);
echo $form;