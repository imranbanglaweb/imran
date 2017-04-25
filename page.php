<?php include 'inc/header.php';?>
<?php 
if (!isset($_GET['pageid']) || $_GET['pageid'] == NULL) {
    echo "<script>window.location='postlist.php';</script>";
}
else{
    $postid=$_GET['pageid'];
}
 ?>
 <?php 
    $pageid=$_GET['pageid'];
    $query="SELECT * FROM tbl_page WHERE id='$pageid'";
    $page=$dbcon->select($query);
    if ($page) {
        while ($result=$page->fetch_assoc()) { ?> 
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2><?php echo $result['name'];?></h2>
				<p><?php echo $result['body'];?><</p>	
		</div>
		</div><!-- end maincontent -->
		 
		<!-- start sidebar -->
			<?php include 'inc/sitebar.php';?>
		<!-- end sidebar -->
	</div>
<!-- end contentsection -->
<?php  }}
else
{
	header("Location:404.php");
}
?>
<?php include 'inc/footer.php';?>