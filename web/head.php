<?php
include '_inc.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>cmrwebdev framework</title>
	<meta name="author" content="Cmrwebdev">
	<meta name="description" content="framework css php cmrwebstrap">
	<meta name="keywords" content="framework css php html">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="https://opensource.keycdn.com/fontawesome/4.7.0/font-awesome.min.css">
	<?php
	$prism="/asset/css/prism.css";
	$normalize="/asset/css/normalize.css";
	$cmrstyle="/asset/css/cmrstyle.css";
	if(count($url)>1):?>
	<link rel="stylesheet" type="text/css" href="../<?=$prism?>">
	<link rel="stylesheet" type="text/css" href="../<?=$normalize?>">
	<link rel="stylesheet" type="text/css" href="../<?=$cmrstyle?>">	
	<?php else :?>
	<link rel="stylesheet" type="text/css" href="asset/css/prism.css">
	<link rel="stylesheet" type="text/css" href="asset/css/normalize.css">
	<link rel="stylesheet" type="text/css" href="asset/css/cmrstyle.css">		
	<?php endif;?>
</head>
<body>

   

