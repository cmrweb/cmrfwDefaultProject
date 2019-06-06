<?= $html->h('1','HOME').
$html->formOpen('#','post','large dark').
  $html->input('text','username','Nom','entrer votre nom').
  $html->textarea('6','msg','Message','msg').
  $html->button('submit','envoyer','primary'). 
  $html->formClose();?>