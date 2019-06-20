<?php
require_once 'inc/function.php';
reconnect_from_cookie();
logged_only();
include_once 'inc/db.php';

$res = $pdo->query("SELECT post.post_id,post.user_id,post.message,post.photo,post.parent_id,users.image,users.username FROM `post`,`users` WHERE users.id=post.user_id AND post.parent_id IS NULL ORDER BY `post_id` DESC");
$resultats = $res->fetchAll(PDO::FETCH_ASSOC);

$res2 = $pdo->query("SELECT post.post_id,post.user_id,post.message,post.photo,post.parent_id,users.image,users.username FROM `post`,`users` WHERE users.id=post.user_id AND post.parent_id IS NOT NULL ORDER BY `post_id` DESC");
$childMsg = $res2->fetchAll(PDO::FETCH_ASSOC);



require 'inc/header.php';
unset($_SESSION['flash']);

?>



<form method="post" action="post.php" enctype="multipart/form-data">
	<fieldset>
		<legend>Nouveau Message</legend>
		<div class="lineform">

			<input type="file" id='file' name="photo" accept="image/*,video/*;capture=camera">
			<input type="text" class="form-control" name="message">
			<input type="submit" name="send" class="btn btn-primary" value="Envoyer">
			<label for="file"><i class='fas fa-image'></i></label>
	</fieldset>
	</div>
</form>

<section>

	<?php
	foreach ($resultats as $key => $value) : ?>
			<article class="message">

				<small><?= $resultats[$key]['username']; ?></small>
				<img src="<?= $resultats[$key]['photo']; ?>" alt="<?= $resultats[$key]['photo']; ?>">
				<p><?= $resultats[$key]['message']; ?></p>
				<div><?= $childMsg[$key]['message']; ?></div>
				<i class="fas fa-thumbs-up"> 23</i>

				<form id="form<?= $resultats[$key]['post_id']; ?>" action="#" enctype="multipart/form-data">

					<div class="lineform">


						<input type="text" class="form-control" name="msg">

					</div>

					<input type="submit" name="sendMsg" class="btn btn-primary" value="Envoyer">
				</form>

			</article>
		<?php endforeach; ?>

</section>
<?php require 'inc/footer.php'; ?>