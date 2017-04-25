<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">	
<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="style.css">
<style type="text/css">
/*default theme*/
<?php include 'theme/default.css'; ?>
/*blue theme*/
<?php include 'theme/blue.css'; ?>
</style>
<?php 
 	$query="SELECT * FROM tbl_theme WHERE id='1'";
 	$theme=$dbcon->select($query);
 	while ($row=$theme->fetch_assoc()) {

 		if ($row['theme'] =='default') {?>
 			<link rel="stylesheet" href="theme/default.css">
 		<?php } 
 		elseif ($row['theme'] =='blue') {?>
 			<link rel="stylesheet" href="theme/blue.css">
 		<?php }?>
 		


 		<?php } ?>