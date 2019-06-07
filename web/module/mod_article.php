<?php
$articleById = new Article("post_id=$id");
foreach ($articleById->getData() as $key => $value) : ?>
        <article class="article medium" value="<?= $value['post_id']; ?>">
            <p><?= $value["post"]; ?></p>
        </article>
<?php endforeach ?>