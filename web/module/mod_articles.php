<?php
$article = new Article('parent_id=0');
var_dump(CONNECT_PATH['local']) ;
var_dump($article->getData());
foreach ($article->getData() as $key => $value) : ?>
	<article class="article" value="<?= $value['post_id']; ?>">
		<h1><a href="article/<?= $value['post_id']; ?>"><?= $value['title']; ?></a></h1>
		<p><?= $value['post']; ?></p>
		<img src="<?=ROOT_DIR.IMG_DIR.'/'.$value["img"]?>" alt="" width="100%">
	</article>
<?php	
endforeach;
