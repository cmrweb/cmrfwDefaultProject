<?php
$db = new DB;
$query = $db->select("*", "cmr_post");
foreach ($db->result as $key => $value) : ?>
	<article class="article" value="<?= $value['post_id']; ?>">
		<h1><a href="article/<?= $value['post_id']; ?>"><?= $value["titre"]; ?></a></h1>
		<p><?= $value["post"]; ?></p>
	</article>
<?php endforeach ?>