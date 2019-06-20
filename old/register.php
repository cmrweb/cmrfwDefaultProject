<?php 

require_once 'inc/function.php';
session_start();

if(!empty($_POST)){
    $errors=array();
    require_once 'inc/db.php';

    if(empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_-]+$/',$_POST['username'])){
        $errors['username']="Votre pseudo n'est pas valide";
    }else{
        $req=$pdo->prepare('SELECT id FROM users WHERE username = ?');
        $req->execute([$_POST['username']]);
        $user = $req->fetch();
        if($user){
            $errors['username']="Ce pseudo est deja pris";
        }
        
    }

    if(empty($_POST['email']) || !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
        $errors['email']="Votre email n'est pas valide";
    }
    if(empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']){
        $errors['password']="Votre mot de passe ne correspond pas";
    }else{
        $req=$pdo->prepare('SELECT id FROM users WHERE email = ?');
        $req->execute([$_POST['email']]);
        $user = $req->fetch();
        if($user){
            $errors['email']="Cet email est deja utilisé pour un autre compte";
        }
        
    }

    if(empty($errors)){
        
        $req = $pdo->prepare("INSERT INTO users SET username = ?,password = ?,email = ?,confirmation_token = ?");
        $password = password_hash($_POST['password'],PASSWORD_BCRYPT);
        $token = str_random(60);
        $req->execute([$_POST['username'],$password,$_POST['email'],$token]); 
        $user_id = $pdo->lastInsertId();
        $message = "
        <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional //EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
        <html xmlns:v='urn:schemas-microsoft-com:vml'>
        
        <head>
        <meta http-equiv='content-type' content='text/html; charset=utf-8'>
        <meta name='viewport' content='width=device-width; initial-scale=1.0; maximum-scale=1.0;'>
        <link href='https://fonts.googleapis.com/css?family=Questrial' rel='stylesheet' type='text/css'>            
        <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet' integrity='sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN'
        crossorigin='anonymous'>
        <title>cmrwebdev</title>
        <style>
            a {color: #ffffff; text-decoration: none;background-color:#740000; border=1px solid #000;}
        </style>
        </head>
        <body leftmargin='0' topmargin='0' marginwidth='0' marginheight='0'>
        
        <table bgcolor='#fff' color='#fff100' width='100%' border='0' cellpadding='0' cellspacing='0'>
        <tbody>
            <tr>
                <td>
                    <table cellpadding='15' cellspacing='0' border='0' height='50' width='100%'>
            <tr>
                <td bgcolor='#740000' color='#ffffff' width='100%' border='1px solid #000'>
                    <h1 style='text-align:center;'>Cmrwebdev</h1>
                    </td>
                    </tr>
                        <tr><td>
                        Cliquez sur le lien ci-dessous pour confirmé votre compte.
                        </td></tr>
                        
                    </table>
                    <table cellpadding='15' cellspacing='0' border='0' height='50' width='40'>
                     <tr>
                     <td>
                    <a style='text-decoration:none;font-size:20px; color: #fff;background-color:#740000; border=1px solid #000;' href='https://tykrastagames.000webhostapp.com/confirm.php?id=$user_id&token=$token''>Confirmation</a>
                    </td>
                    </tr>
                    </table> 
                </td>
            </tr>
        </tbody>
    </table>

        </body>
        </html>
        ";
        // Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <Cmrwebdev>' . "\r\n";
session_start();
        mail($_POST['email'],'Cmrwebdev confirmation de votre compte',$message,$headers);
        
        $_SESSION['flash']['success'] = "Un email de confirmation vous a été envoyé pour valider votre compte";
        header('Location: login.php');
        exit();
    }
    
}
?>
<?php require "inc/header.php"; ?>
<h1>S'inscrire</h1>

<?php if(!empty($errors)): ?>
<div class="alert alert-danger">
    <p>Vous n'avez pas rempli le formulaire correctement</p>
<ul>
<?php foreach($errors as $error):  ?>
    <li><?= $error; ?></li>
<?php endforeach; ?>
</ul>
</div>
<?php endif; ?>

<form action="#" method="post">
	<div class="form-group">
		<label for="">Pseudo</label>
		<input type="text" class="form-control" name="username"  >
	</div>
	<div class="form-group">
		<label for="">Email</label>
		<input type="email" class="form-control" name="email"  >
	</div>
	<div class="form-group">
		<label for="">Mot de passe</label>
		<input type="password" class="form-control" name="password"  >
	</div>
	<div class="form-group">
		<label for="">Confirmez votre mot de passe</label>
		<input type="password" class="form-control" name="password_confirm"  >
	</div>
	<button type="submit" class="btn btn-primary">S'inscrire</button>
</form>

<?php require "inc/footer.php"; ?>