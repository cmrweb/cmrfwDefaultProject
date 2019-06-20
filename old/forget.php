<?php

if(!empty($_POST) && !empty($_POST['email'])){
    require_once 'inc/db.php';
    require_once 'inc/function.php';
    $req = $pdo->prepare('SELECT * FROM users WHERE  email = ? AND confirmed_at IS NOT NULL');
    $req->execute([$_POST['email']]);
    $user = $req->fetch();
    if($user){
        session_start();
        $reset_token = str_random(60);
        $pdo->prepare('UPDATE users SET reset_token = ?,reset_at = NOW() WHERE id = ?')->execute([$reset_token, $user->id]);
        $_SESSION['flash']['success'] = "Les instruction vous ont été envoyer par email";
        
        mail($_POST['email'],'Réinitialisation de votre compte',"Afin de réinitialiser votre compte merci de cliquer sur ce lien <a href='http://localhost/phptest/reset.php?id={$user->id}&token=$reset_token'>Confirmation</a>");
        
        header('Location: login.php');
        exit();
    }else{
        session_start();
        $_SESSION['flash']['danger'] = "Aucun compte ne correspond a cet adresse";
    }
}

?>

<?php require 'inc/header.php' ?>

<h1>Mot de passe oublié</h1>

<form action="#" method="post">
<div class="form-group">
    <label for="">Email</label>
    <input type="email" class="form-control" name="email"  >
</div>
<button type="submit" class="btn btn-primary">Se connecter</button>
</form>
<?php require 'inc/footer.php' ?>