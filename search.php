<?php include 'inc/header.php';?>
<?php 
if (!isset($_GET['search']) || $_GET['search'] == NULL) {
	header("Location:404.php");
}
else{
	$search=$_GET['search'];
}
 ?>

	<div class="contentsection contemplete clear">
<div class="maincontent clear">
<?php 
	$query="SELECT * FROM tbl_post WHERE 
	title LIKE '%$search%' OR body LIKE '%$search%'";
	$post=$dbcon->select($query);
	if ($post) {
		while ($result=$post->fetch_assoc()) {?>
	<div class="samepost clear">
<h2>
<a href="post.php?postid=<?php echo $result['id']; ?>">
	<?php echo $result['title']; ?>
</a>
</h2>
<h4>
<?php echo $dfm->formatdate($result['date']); ?>
<a href="#">
<?php echo $result['author']; ?>
</a>
</h4>
<a href="#">
	<img src="admin/<?php echo $result['image'];?>">
</a>
<?php echo $dfm->textshort($result['body'],100); ?>
<div class="readmore clear">
<a href="post.php?postid=<?php echo $result['id']; ?>">
	Read More
</a>
</div>
	</div>
	<!-- end samepost -->
		

		<?php }}
			else{
				echo "Your search dosent match..";
			}
		?>
		</div>
		<!-- start sidebar -->
			<?php include 'inc/sitebar.php';?>
		<!-- end sidebar -->
	</div>
	<!-- end contentsection -->
<?php include 'inc/footer.php';?>