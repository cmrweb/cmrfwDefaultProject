<?php
echo $html->h('1', !empty($username) ? 'Welcome Home ' . $username : 'Welcome Home', 'large');
//versioning beta
$old = 'test  aeea';
$new = 'test eeb';
preg_match_all("/[^~$new+~]|[\s]/","$old",$matches);
preg_match_all("/[^~$old+~]|[\s]/","$new",$notin);
echo '<pre>';
var_dump($matches);
echo '</pre>';
echo '<pre>';
var_dump($notin);
echo '</pre>';
echo $old;
echo '<br>';
echo $new;
