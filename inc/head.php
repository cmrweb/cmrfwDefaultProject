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
	if(count($url)>1):?>
	<link rel="stylesheet" type="text/css" href="../css/prism.css">
	<link rel="stylesheet" type="text/css" href="../css/normalize.css">
	<link rel="stylesheet" type="text/css" href="../css/cmrstyle.css">	
	<?php else :?>
	<link rel="stylesheet" type="text/css" href="css/prism.css">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/cmrstyle.css">		
	<?php endif;?>
</head>
<body>

   

