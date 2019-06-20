<?php
require_once 'inc/function.php';
logged_only();
if(!empty($_POST)){

    if(empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']){
        $_SESSION['flash']['danger'] = "Les mots de passes ne correspondent pas";

    }else{
        $user_id = $_SESSION['auth']->id;
        $user_name = $_POST['username'];
        $user_email = $_POST['email'];
        $password = password_hash($_POST['password'],PASSWORD_BCRYPT);
        require_once 'inc/db.php';
        $pdo->prepare('UPDATE users SET username = ? , email = ? , password = ? WHERE id = ?')->execute([$user_name,$user_email,$password,$user_id]);
        $_SESSION['flash']['success'] = "Votre compte a bien été mis a jour";
       
    }
}

if(isset($_FILES['photo']) AND !empty($_FILES['photo']['name'])){
    $maxsize = 2097152;
    $validextention = array('jpg','jpeg','gif','png');
    if($_FILES['photo']['size'] <= $maxsize){
        $uploadext =strtolower(substr(strrchr($_FILES['photo']['name'],'.'),1));
        if(in_array($uploadext,$validextention)){
            $dir = "users/img/".$_SESSION['auth']->id.'.'.$uploadext;
            $result = move_uploaded_file($_FILES['photo']['tmp_name'],$dir);
            if($result){
            require_once 'inc/db.php';
                $update = $pdo->prepare('UPDATE users SET `image` = :photo WHERE id = :id');
                $update->execute(array('photo'=>$_SESSION['auth']->id.".".$uploadext,'id'=>$_SESSION['auth']->id));
            }else{ $_SESSION['flash']['danger'] = "Erreur";}
        }else{
            $_SESSION['flash']['danger'] = "Votre photo doit être au format jpg, jpeg, gif ou png";
        }
    }else{
        $_SESSION['flash']['danger'] = "Votre photo ne doit pas dépasser 2Mo";
    }

}
require 'inc/header.php';
?>
<h1>Gestion du compte</h1>

<form action="#" method="post" enctype="multipart/form-data">
<div class="form-group">
		<label for="">Pseudo</label>
		<input type="text" class="form-control" name="username" value="<?= $_SESSION['auth']->username; ?>" >
	</div>
	<div class="form-group">
		<label for="">Email</label>
		<input type="email" class="form-control" name="email" value="<?= $_SESSION['auth']->email; ?>" >
	</div>
<div class="form-group">
<label for="">Changer mot de passe</label>
<input type="password" class="form-control" name="password"  >
</div>
<div class="form-group">
<label for="">Confirmez votre mot de passe</label>
<input type="password" class="form-control" name="password_confirm"  >
</div>
<div class="form-group">
<label for="">Photo de profil</label>
<input type="file" class="form-control" name="photo"  >
</div>
<button type="submit" class="btn btn-primary">Accepter les modifications</button>
</form>

<?php require 'inc/footer.php' ?>