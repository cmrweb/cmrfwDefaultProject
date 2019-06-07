<?php
$article = new Article;
//var_dump($article->getPostId());
foreach ($article->getData() as $key => $value) : ?>
	<article class="article" value="<?= $value['post_id']; ?>">
		<h1><a href="article/<?= $value['post_id']; ?>"><?= $value['title']; ?></a></h1>
		<p><?= $value['post']; ?></p>
	</article>
<?php	
endforeach;
