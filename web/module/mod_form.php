<?php
$msg = "";
if(isset($_FILES['upload']))
$file=array_filter($_FILES['upload']);
if (isset($_POST['send'])&&$file!=1) {
    if (!empty($_POST['title']) && !empty($_POST['msg'])) {
        try {
            $db = new DB;
            $db->insert('cmr_post(user_id,titre,post)', "1,'{$_POST['title']}','{$_POST['msg']}'");
            $msg = "Message envoyer";
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    } else {
        $msg = "Bah alors! tu ne veux rien écrire ???";
    }
}
if (isset($_POST['send'])&&$file>1) {    
    
    if (isset($file)>1) {
        if ($_FILES['upload']["size"] <= 5000000) {
            $check = getimagesize($_FILES["upload"]["tmp_name"]);
            if ($check) {
                $target_dir = '../' . ROOT_DIR . IMG_DIR;
                $bytes = random_bytes(5);
                $ext= pathinfo(basename($_FILES["upload"]["name"]), PATHINFO_EXTENSION);
                $target_file = bin2hex($bytes);
                $uploadName = strtolower($target_dir.'/'.$target_file.'.'.$ext);                      
                $fileDbName=strtolower($target_file.'.'.$ext);
                if (move_uploaded_file($_FILES["upload"]["tmp_name"], $uploadName)) {
                    try {
                        $db = new DB;
                        $db->insert('cmr_post(user_id,titre,post,img)', "1,'{$_POST['title']}','{$_POST['msg']}','$fileDbName'");
                        //$msg = "Message envoyer";
                    } catch (Exception $e) {
                        echo $e->getMessage();
                    }
                    $msg ="image envoyer";
                } else {
                    $msg= "Erreur";
                }
            } else {
                $msg = "ce n'est pas une image.";
            }
        } else {
            $msg = "fichier trop lourd";
        }
    }
}

$form = $html->h('1', 'Article') .
    $html->formOpen('', 'post', 'large dark') .
    $html->input('text', 'title', 'Titre') .
    $html->textarea('6', 'msg', 'Message', 'msg') .
    $html->input('file', 'upload', 'file') .
    $html->button('submit', 'primary center', 'envoyer', 'send') .
    $html->formClose() .
    $html->p($msg);
echo $form;
