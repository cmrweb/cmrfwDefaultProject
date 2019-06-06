<h1>Article <?= isset($id) ? $id  : 'Home' ?></h1>

<?php if (isset($id)) :
    $db = new DB;
    $query = $db->select("*", "cmr_post", "post_id=$id");
    foreach ($db->result as $key => $value) : ?>
        <article class="article medium" value="<?= $value['post_id']; ?>">
            <p><?= $value["post"]; ?></p>
        </article>
    <?php endforeach ?>
<?php else : ?>
    <section class="medium primary">
        <?php include 'inc/module/mod_article.php'; ?>
    </section>
<?php endif; ?>