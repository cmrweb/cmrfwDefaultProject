<?php
require_once '../' . ROOT_DIR . MOD_DIR . 'mod_form.php';
$article = new Article('parent_id=0', true);
$countCom = new DB;
$countCom->select("parent_id,COUNT(parent_id) as comm", "cmr_post", null, false, "parent_id");
//dump($countCom->result);
//dump($article->getData());

foreach ($article->getData() as $key => $value) : ?>
	<article class="article" value="<?= $value['post_id']; ?>">
		<h1><a href="article/<?= $value['post_id']; ?>"><?= $value['title'] ?></a></h1>
		<!-- <?php
		if(isset($_POST['like'])){
			$article->like("post_id={$value['post_id']}");
		}
		?>
		<form action="" method="post">
			<button type="submit" name="like">like <?= $value['like']; ?></button>			
		</form>	 -->

		<?php
		foreach ($countCom->result as $k => $v) :
			if ($v['parent_id'] == $value['post_id']) : ?>
				<small><?= $v['comm'] ?> Commentaire</small>
			<?php endif;
		endforeach;
		?>
		<p><?= $value['post']; ?></p>
		<img src="<?= ROOT_DIR . IMG_DIR . '/' . $value["img"] ?>" alt="" width="100%">
	</article>
<?php
endforeach;
