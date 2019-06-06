<h1>Article <?= isset($id) ? $id  : 'Home' ?></h1>
<?php 
if (isset($id)) :?>
    <section class="medium primary">
        <?php include 'inc/module/mod_article.php'; ?>
    </section>
<?php else : ?>
    <section class="medium primary">
        <?php include 'inc/module/mod_articles.php'; ?>
    </section>
<?php endif; ?>