<?php
echo $html->h('1', !empty($username) ? 'Welcome Home ' . $username : 'Welcome Home', 'large');
//versioning beta
$old = 'test1 aeea';
$new = 'test2 eeb';
preg_match_all("/[^~$new+~]|[\s]/","$old",$matches);
preg_match_all("/[^~$old+~]|[\s]/","$new",$notin);
dump($matches);
dump($notin);
echo $old;
echo '<br>';
echo $new;
echo '<br>';
function computeDiff($from, $to)
{
    $diffValues = array();
    $diffMask = array();

    $dm = array();
    $n1 = count($from);
    $n2 = count($to);

    for ($j = -1; $j < $n2; $j++) $dm[-1][$j] = 0;
    for ($i = -1; $i < $n1; $i++) $dm[$i][-1] = 0;
    for ($i = 0; $i < $n1; $i++)
    {
        for ($j = 0; $j < $n2; $j++)
        {
            if ($from[$i] == $to[$j])
            {
                $ad = $dm[$i - 1][$j - 1];
                $dm[$i][$j] = $ad + 1;
            }
            else
            {
                $a1 = $dm[$i - 1][$j];
                $a2 = $dm[$i][$j - 1];
                $dm[$i][$j] = max($a1, $a2);
            }
        }
    }

    $i = $n1 - 1;
    $j = $n2 - 1;
    while (($i > -1) || ($j > -1))
    {
        if ($j > -1)
        {
            if ($dm[$i][$j - 1] == $dm[$i][$j])
            {
                $diffValues[] = $to[$j];
                $diffMask[] = 1;
                $j--;  
                continue;              
            }
        }
        if ($i > -1)
        {
            if ($dm[$i - 1][$j] == $dm[$i][$j])
            {
                $diffValues[] = $from[$i];
                $diffMask[] = -1;
                $i--;
                continue;              
            }
        }
        {
            $diffValues[] = $from[$i];
            $diffMask[] = 0;
            $i--;
            $j--;
        }
    }    

    $diffValues = array_reverse($diffValues);
    $diffMask = array_reverse($diffMask);

    return array('values' => $diffValues, 'mask' => $diffMask);
}
function getchange($str,$style){
    return "<$style>".$str."</$style>";
}
function diffline($line1, $line2)
{
    $diff = computeDiff(str_split($line1), str_split($line2));
    $diffval = $diff['values'];
    $diffmask = $diff['mask'];
    echo '<pre>';
    var_dump($diffval);
    echo '</pre>';
    echo '<pre>';
    var_dump($diffmask);
    echo '</pre>';
    $n = count($diffval);
    $pmc = 0;
    $result = '';
    $msg='';
    $msg2='';
    for ($i = 0; $i < $n; $i++)
    {
        $mc = $diffmask[$i];
        if ($mc != $pmc)
        {
            switch ($pmc)
            {
                case -1:$msg.='<del>'. $result .'</del>'; break;
                case 1:$msg.= '<ins>'.$result .'</ins>'; break;
            }
            switch ($mc)
            {
                case -1:$msg.='<del>'. $result .'<del>'; break;
                case 1:$msg.='<ins>'.$result .'</ins>'; break;
            }
        }
        $msg .= $diffval[$i];

        $pmc = $mc;
    }
    switch ($pmc)
    {
        case -1:$msg.= '<del>'.$result .'</del>'; break;
        case 1:$msg.='<ins>'.$result .'</ins>'; break;
    }
    return $msg;
    
}
echo diffline($old, $new);