<?php
if ($argc != 3 || in_array($argv[1], array('--help', '-help', '-h', '-?'))) {
    ?>
    Utilisation :
    <?php echo $argv[0]."\n";?>
    --help|-help|-h|-?                 Aide
    --install|-install|-i <module>     Install module : article|user
                                    
    <?php
} elseif ($argc != 3 || in_array($argv[1], array('--install','-install', '-i'))) {
    if(in_array($argv[2], array('article'))){
    ?> 
    module_<?php echo $argv[2]; ?>
    <?php
    echo 'Press Enter to continue or type yes or no: ';
    $handle = fopen ('php://stdin','r');
    $line = fgets($handle);
    if(preg_match('/no|n/',trim($line))){
        echo 'ABORTING!';
        exit;
    }else if(preg_match('/yes|y|/',trim($line))){
        $file = 'article/Article.php';
        $file2 = 'article/mod_article.php';
        $content='<?php
        class Article
        {
            private $data;
            private $post_id;
            private $user_id;
            private $title;
            private $post;
            private $img;
            function __construct($bool=NULL)
            {
                $pdo=new DB;
                $pdo->select(\'*\', \'cmr_post\',$bool);
                foreach ($pdo->result as $value) {
                    $this->data[$value[\'post_id\']] = [
                        \'post_id\' => $value[\'post_id\'],
                        \'user_id\' => $value[\'user_id\'],
                        \'title\' => $value[\'titre\'],
                        \'post\' => $value[\'post\'],
                        \'img\' => $value[\'img\']
                    ];
                    $this->post_id[] = $value[\'post_id\'];
                    $this->user_id[] = $value[\'user_id\'];
                    $this->title[] = $value[\'titre\'];
                    $this->post[] = $value[\'post\'];
                    $this->img[] = $value[\'img\'];
                }
                
                return $this->data;
            }
            public function getData():array
            {
                return $this->data;
            }
            public function getPostId():array
            {
                return $this->post_id;
            }
            public function getUserId():array
            {
                return $this->user_id;
            }
            public function getTitle():array
            {
                return $this->title;
            }
            public function getPost():array
            {
                return $this->post;
            }
        
            public function getImg():array
            {
                return $this->img;
            }
        }
        ';
        $content2="<?php  
        \$articleById = new Article('post_id=\$id');
        foreach (\$articleById->getData() as \$key => \$value) : ?>
                <article class='article medium' value=\"<?= \$value['post_id']; ?>\">
                    <p><?= \$value['post']; ?></p>
                    <img src=\"<?=ROOT_DIR.IMG_DIR.'/'.\$value['img']?>\" alt='' width='100%'>
                </article>
        <?php endforeach ?>";
        echo trim($line);
        file_put_contents($file2,$content2, FILE_APPEND | LOCK_EX);
        file_put_contents($file, $content, FILE_APPEND | LOCK_EX);
        echo 'article Generated';
    }}else{
        echo 'commande inconnu...';
    }

} else {
    echo $argv[1];
}
?>