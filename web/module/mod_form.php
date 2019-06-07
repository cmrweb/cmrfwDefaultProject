<?php
$msg="";
if(isset($_POST['send'])){
 if(!empty($_POST['title'])&&!empty($_POST['msg'])){
    try {
        $db = new DB;
        $db->insert('cmr_post(user_id,titre,post)',"1,'{$_POST['title']}','{$_POST['msg']}'");
        $msg = "Message envoyer";
    } catch (Exception $e) {
        echo $e->getMessage();
    }
 }else{
    $msg = "Bah alors! tu ne veux rien écrire ???";
}
}
$form = $html->h('1', 'Article') .
    $html->formOpen('', 'post', 'large dark') .
    $html->input('text', 'title', 'Titre') .
    $html->textarea('6', 'msg', 'Message', 'msg') .
    $html->button('submit','primary center', 'envoyer','send' ) .
    $html->formClose().
    $html->p($msg);
echo $form;