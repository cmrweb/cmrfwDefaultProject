<?php
echo $html->h('1', !empty($username) ? 'Welcome Home ' . $username : 'Welcome Home', 'large');
//versioning beta
$old = 'test1 aeea echo';
$new = 'test2 eeb echo';
echo $html->h('3',"versioning");
echo $old;
echo '<br>';
echo $new;
echo '<br>';
$res = versioning($old, $new);
echo $res;

//Hashtag beta
echo $html->h('3',"hashtag");
echo $html->input('text','text','text','medium','text');
?>
<script>
var text = document.querySelector('#text');
text.addEventListener('keyup',function(){
    console.log(text.value);
    var matches = text.value.match(/\#(\w*)/g);
    console.log(matches);
});
</script>