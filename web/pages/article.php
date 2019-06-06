<h1>Article <?= isset($id) ? $id  : 'Home' ?></h1>
<?php 
if (isset($id)) :?>
    <section class="medium primary">
        <?php include 'web/module/mod_article.php'; ?>
    </section>
<?php else : ?>
    <section class="medium primary">
        <?php include 'web/module/mod_articles.php'; ?>
    </section>
<?php endif; ?>