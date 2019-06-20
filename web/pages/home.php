<?php
echo $html->h('1', !empty($username) ? 'Welcome Home ' . $username : 'Welcome Home', 'large');
//versioning beta
 $old = 'test1';
 $new='test2';
if (isset($_POST['send'])) {  
    $new = $_POST['version'];
}
$hashtag=new DB;
$hashtag->select('tag','cmr_hashtag');
dump($hashtag->result);
foreach ($hashtag->result as $key => $tag) {
 $result = preg_replace('%(<a[^>]*>.*?</a>)|#%', compute_replacement($tag), $tag);
 dump($result);
}
if (isset($_POST['hash'])) {  
    $newhash = $_POST['hashtag'];
   
    $hashtag->insert("cmr_hashtag(tag)",$newhash);
}

function compute_replacement($groups) {
    // You can vary the replacement text for each match on-the-fly
    // $groups[0] holds the regex match
    // $groups[n] holds the match for capturing group n
    if ($groups[1]) {
        return $groups[1];
    } else {
        return "<a href='#'>$groups[0]</a>";
}
}

echo $html->h('3',"versioning").
$html->formOpen('', 'post') .
$html->input('text','version','version','medium','text',$new).
$html->button('submit', 'dark center', 'send', 'send') .
$html->formClose();
echo$html->p($old) ;
echo$html->p($new) ;
$res = versioning($old, $new);
echo$html->p($res) ;

//Hashtag beta
echo $html->h('3',"hashtag");
echo $html->h('6','');
echo$html->formOpen('', 'post') .
 $html->input('text','text','hashtag','medium','text').
$html->button('submit', 'dark center', 'send', 'hash') .
$html->formClose();
?>
<script>
var text = document.querySelector('#text');
text.addEventListener('keyup',function(){
    console.log(text.value);
    var matches = text.value.match(/\#(\w*)/g);
    $('h6').html('<p>'+matches+'</p>');
});
</script>
<style>
.video{
    position:relative;
    margin: auto;
    width: 80%;
}
video {
    display: block;
    width: 100%;
    margin:20px 0;
}
.videoController{
    position: absolute;
    bottom: 0;
    width: 100%;
}

</style>
<!-- Video player -->
<section class="video">
    <video id="video" src="<?=ROOT_DIR.VIDEO_DIR?>./video.mp4"></video>
<div class="videoController">
    <span id="play">play</span>
    <span>prev</span>
    <span>next</span>
</div>
</section>
<script>
$( document ).ready(function() {
    var video = document.querySelector('#video')
    $('#play').click(function() {
        video.paused ? video.play() : video.pause();
    });
});
</script>