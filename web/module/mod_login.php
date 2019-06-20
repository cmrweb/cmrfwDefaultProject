<?php
if (isset($_POST['send'])) {
    if (!empty($_POST['username_Log']) && !empty($_POST['password_Log'])) {
        $name = $_POST['username_Log'];  
        $user = new User("username='{$name}'");
        if ($user->getData()) {
            foreach ($user->getData() as $key => $value) {
                $pass = password_verify($_POST['password_Log'], $value['password']); 
            if($pass){
                $_SESSION['user'] = [
                    "id" => $value['user_id'],
                    "name" => $value['username']
                ];
                $user_id = $_SESSION['user']['id'];
                $user_name = $_SESSION['user']['name'];
              $_SESSION['flash']['success'] = 'connected'; 
               header("Location: index.php");
            }else{
               $_SESSION['flash']['danger'] ='error mp ou pseudo';
            }
            }
        } else {
            $_SESSION['flash']['danger'] = "Mais! qui est tu ???";
        }
    } else {
        $_SESSION['flash']['danger'] = "heu! tu ne comprend pas ???";
    }
}


$form = $html->formOpen('', 'post', 'medium dark formLog') .
    $html->input('text', 'username_Log', 'Nom d\'utilisateur', 'entrer votre nom') .
    $html->input('password', 'password_Log', 'mot de passe') .
    $html->button('submit', 'primary center', 'se connecter', 'send') .
    $html->formClose();
    
echo $form;