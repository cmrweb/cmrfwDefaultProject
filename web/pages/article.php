<!-- 
    
 -->
<h1>Article <?= isset($id) ? $id  : 'Article' ?></h1>
<?php 
require_once '../'.ROOT_DIR.MOD_DIR.'mod_form.php';
if (isset($id)) :?>
    <section class="medium primary">
        <?php include 'web/module/mod_article.php'; ?>
    </section>
<?php else : ?>
    <section class="medium primary">
        <?php include 'web/module/mod_articles.php'; ?>
    </section>
<?php endif; 