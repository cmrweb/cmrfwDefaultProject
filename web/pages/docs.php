<?php
$code = new DB;
$code->select('*', 'cmr_code');
//dump($code->result);
?>
<section>
    <table class='sidenav'>
        <tr class='sideul'>
            <th>HTML</th>
            <?php foreach ($code->result as $key => $value) : ?>
                <td ><a href="#<?= $value['titre'] ?>"><?= $value['titre'] ?></a></td>
            <?php endforeach ?>
        </tr>
    </table>
</section>
<section class="large">
    <?php foreach ($code->result as $key => $value) : ?>
        <article  id="<?= $value['titre'] ?>">
            <h1><?= $value['titre'] ?></h1>
            <pre>
    <code class="language-php">
    <?= $value['code'] ?>
    </code>
    </pre>
            <h3>Usage</h3>
            <pre>
    <code class="language-php">
    <?= $value['demo'] ?>
    </code>
    </pre>
            <h3>Rendu</h3>
            <?php eval($value['demo']); ?>
        </article>
        <hr>
    <?php endforeach ?>
</section>