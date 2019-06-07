<?php

$user=new User("user_id=$user_id");
echo $html->h('1','Welcome Home '.$user->getName(),'large');

var_dump($user->getData());

$form = $html->h('1', 'Article') .
    $html->formOpen('', 'post', 'large dark') .
    $html->input('text', 'username', 'Nom d\'utilisateur', 'entrer votre nom') .
    $html->input('password', 'password', 'mot de passe') .
    $html->button('submit','primary center', 'se connecter','send' ) .
    $html->formClose().
    $html->p($msg);
echo $form;