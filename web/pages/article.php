<!-- 
    
 -->
<h1>Article <?= isset($id) ? $id  : 'Article' ?></h1>
<?php

if (isset($id)) : ?>
    <section class="medium primary">
        <?php require_once '../' . ROOT_DIR . MOD_DIR . 'mod_article.php';
        require_once '../' . ROOT_DIR . MOD_DIR . 'mod_form.php'; ?>

    </section>
<?php else : ?>
    <section class="medium primary">
        <?php require_once '../' . ROOT_DIR . MOD_DIR . 'mod_form.php';
        require_once '../' . ROOT_DIR . MOD_DIR . 'mod_articles.php'; ?>
    </section>
<?php endif;
