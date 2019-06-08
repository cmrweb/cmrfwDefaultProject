<?php
if ($argc != 3 || in_array($argv[1], array('--help', '-help', '-h', 'help'))) {
    ?>
    Utilisation :
    <?php echo $argv[0]."\n";?>
    --help|-help|-h|help                    Aide
    --new|-new|-new|new|n <module>          new module    |> article|a 
                                                          |> user|u  

    --init|-init|-init|init|i <project>     init project  |> article|a 
                                                          |> user|u              
    <?php
//} elseif ($argc != 3 || in_array($argv[1], array('new','--new','-new', '-n','n'))) {
} elseif ($argc != 2 || in_array($argv[1], array('init','--init','-init', '-i','i'))) {
    echo'init '.$argv[2];
} elseif ($argc != 3 || in_array($argv[1], array('new','--new','-new', '-n','n'))) {
    if(in_array($argv[2], array('article'))){
    ?> 
    module_<?php echo $argv[2]."\n"; ?>
    <?php
    echo 'Enter|yes|y no|n'."\n";
    echo 'Press Enter to continue: ';
    $handle = fopen ('php://stdin','r');
    $line = fgets($handle);
    if(preg_match('/no|n/',trim($line))){
        echo 'Annulé!';
        exit;
    }else if(preg_match('/yes|y|/',trim($line))){
        $pathEntity = 'generated/Entity';
        $pathModule = 'generated/module';
        if (!is_dir($pathModule)&&!mkdir($pathModule, 0777,true)) {
            die('Echec lors de la création des répertoires...');
        }
        if (!is_dir($pathEntity)&&!mkdir($pathEntity, 0777,true)) {
            die('Echec lors de la création des répertoires...');
        }
        $file = $pathEntity.'/Article.php';
        $file2 = $pathModule.'/mod_article.php';
        $content=file_get_contents('http://tykrastagames.free.fr/mod_article.txt');
        $content2=file_get_contents('http://tykrastagames.free.fr/Article.txt');
        file_put_contents($file2,$content);
        file_put_contents($file, $content2);
        echo 'Article Générer';
    }
 }elseif(in_array($argv[2], array('user','u'))){ 
     echo 'user';
// }elseif(in_array($argv[2], array('article'))){ //add cmd
}else{
        echo 'commande inconnu...';
    }

} else {
    echo $argv[1];
}
?>