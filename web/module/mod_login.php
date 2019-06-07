<?php
$msg = "";
if (isset($_POST['send'])) {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $name = $_POST['username'];  
        $user = new User("username='{$name}'");
        if ($user->getData()) {
            foreach ($user->getData() as $key => $value) {
                $pass = password_verify($_POST['password'], $value['password']); 
            if($pass){
                $_SESSION['user'] = [
                    "id" => $value['user_id'],
                    "name" => $value['name']
                ];
                $user_id = $_SESSION['user']['id'];
                $user_name = $_SESSION['user']['name'];
               $msg= 'connected'; 
            }else{
                $msg='error mp ou pseudo';
            }
            }
        } else {
            $msg = "Mais! qui est tu ???";
        }
    } else {
        $msg = "heu! tu ne comprend pas ???";
    }
}


$form = $html->h('1', 'Login Module') .
    $html->formOpen('', 'post', 'large dark') .
    $html->input('text', 'username', 'Nom d\'utilisateur', 'entrer votre nom') .
    $html->input('password', 'password', 'mot de passe') .
    $html->button('submit', 'primary center', 'se connecter', 'send') .
    $html->formClose() .
    $html->p($msg);
echo $form;