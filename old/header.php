<?php 
if(session_status() == PHP_SESSION_NONE){
	session_start();
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title></title>
	<meta name="author" content="Camara Enrique">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="viewport" content="width=device-width,initial-scale=1">	
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-109820201-4"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-109820201-4');
</script>

</head>

<body>
<header>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="nav-link" href="index.php"><h1>PLEYZ</h1></a>
  <div class="collapse navbar-collapse" id="navbarColor01">
  <ul class="navbar-nav mr-auto" >
  <?php if(isset($_SESSION['auth'])): ?>
		  <li class="nav-item active">
			  <a class="nav-link" href="logout.php">Se déconnecter</a>
			</li> 
  <?php else: ?>
		  <li class="nav-item">
			  <a class="nav-link" href="register.php">S'inscrire</a>
		  </li>
		  <li class="nav-item">
			  <a class="nav-link" href="login.php">Se connecter</a>
		  </li>
		  
  <?php endif; ?>
  </ul>
  </div>
</nav>
<?php if(!empty($_SESSION['auth']->image)):?>
<figure>
<a href="account.php"><img src="users/img/<?php echo $_SESSION['auth']->image; ?>" alt="photo de profil"><p><?php echo $_SESSION['auth']->username;?><p></a>
</figure>
<?php elseif(!empty($_SESSION['auth']->username)): ?>
<figure>
<a href="account.php"><p><?php echo $_SESSION['auth']->username;?><p></a>
</figure>
<?php endif;?>
</header>
<div class="container">

<?php if(isset($_SESSION['flash'])): ?>
<?php foreach($_SESSION['flash'] as $type => $message): ?>
<div class="alert alert-<?= $type; ?>">
	<?= $message; ?>
</div>
<?php endforeach; ?>
<?php unset($_SESSION['flash']); ?>
<?php endif; ?>