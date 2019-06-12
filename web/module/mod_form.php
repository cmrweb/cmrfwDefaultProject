<?php
$msg = "";
$user_id = 1;
if (isset($_FILES['upload']))
    $file = array_filter($_FILES['upload']);
//var_dump($file);
if (isset($_POST['send']) && isset($file["error"])) {
    if (!empty($_POST['title']) && !empty($_POST['msg'])) {
        try {
            $db = new DB;
            if (isset($id)) {
                $db->insert('cmr_post(user_id,parent_id,titre,post)', "$user_id,$id,'{$_POST['title']}','{$_POST['msg']}'");
                $msg = "Message envoyer";
            } else {
                $db->insert('cmr_post(user_id,titre,post)', "$user_id,'{$_POST['title']}','{$_POST['msg']}'");
                $msg = "Message envoyer";
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    } else {
        $msg = "Bah alors! tu ne veux rien écrire ???";
    }
}
if (isset($_POST['send']) && !isset($file["error"])) {
    if (!empty($_POST['title'])) {
        if ($_FILES['upload']["size"] <= 5000000) {
            $check = getimagesize($_FILES['upload']["tmp_name"]);
            if ($check) {
                $target_dir = '../' . ROOT_DIR . IMG_DIR;
                $bytes = random_bytes(5);
                $ext = pathinfo(basename($_FILES['upload']["name"]), PATHINFO_EXTENSION);
                $target_file = bin2hex($bytes);
                $uploadName = strtolower($target_dir . '/' . $target_file . '.' . $ext);
                $fileDbName = strtolower($target_file . '.' . $ext);
                if (move_uploaded_file($_FILES['upload']["tmp_name"], $uploadName)) {
                    try {
                        if (isset($id)) {
                            $db = new DB;
                            $db->insert('cmr_post(user_id,parent_id,titre,post,img)', "$user_id,$id,'{$_POST['title']}','{$_POST['msg']}','$fileDbName'");
                        } else {
                            $db = new DB;
                            $db->insert('cmr_post(user_id,titre,post,img)', "$user_id,'{$_POST['title']}','{$_POST['msg']}','$fileDbName'");
                        }
                    } catch (Exception $e) {
                        echo $e->getMessage();
                    }
                    $msg = "image envoyer";
                } else {
                    $msg = "Erreur";
                }
            } else {
                $msg = "ce n'est pas une image.";
            }
        } else {
            $msg = "fichier trop lourd";
        }
    }else{
        $msg = "Tu peut mettre un titre stp!";
    }
}

     




$form = $html->code('section',
    $html->h('1', 'Message') .
    $html->formOpen('', 'post', 'large dark') .
    $html->input('text', 'title', 'Titre') .
    $html->textarea('6', 'msg', 'Message', 'msg') .
    $html->input('file', 'upload', 'file') .
    $html->img('','imgpreview','img'). 
    $html->button('submit', 'primary center', 'envoyer', 'send') .
    $html->formClose() .
    $html->p($msg),
    'gold formtop');
echo $form;
?>

