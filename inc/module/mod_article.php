<?= 
include_once 'inc/sql.php';
$query = "SELECT * FROM `cmr_post`"; 
$result = mysqli_query($connect, $query);
while($row = mysqli_fetch_array($result)):;?>
				<article class="article"  value="<?= $row[0];?>">

				<h1><a href="article/<?=$row[0];?>"><?= $row[2];?></a></h1>
				<p><?= $row[3];?></p>

				</article>
                  				
<?php endwhile;?>

