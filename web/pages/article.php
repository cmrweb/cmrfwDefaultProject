<!-- 
    
 -->
<h1>Article <?= isset($id) ? $id  : '' ?></h1>
<?php

if (isset($id)) : ?>
    <section class="large primary">
        <?php require_once '../' . ROOT_DIR . MOD_DIR . 'mod_article.php'; ?>
    </section>
    <!-- <section class="large primary">
        <?php require_once '../' . ROOT_DIR . MOD_DIR . 'mod_form.php'; ?>
    </section> -->
<?php else : ?>
    <section class="medium primary">
        <?php require_once '../' . ROOT_DIR . MOD_DIR . 'mod_form.php';
        require_once '../' . ROOT_DIR . MOD_DIR . 'mod_articles.php'; ?>
    </section>
<?php endif;
