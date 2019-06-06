<?php
$articleById = new Article("post_id=$id");
foreach ($articleById->data as $key => $value) : ?>
        <article class="article medium" value="<?= $value['post_id']; ?>">
            <p><?= $value["post"]; ?></p>
        </article>
<?php endforeach ?>