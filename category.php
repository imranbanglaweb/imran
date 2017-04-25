<?php include 'inc/header.php';?>
<?php include 'inc/slider.php';?>
<?php 
if (!isset($_GET['catid']) || $_GET['catid'] == NULL) {
	header("Location:404.php");
}
else{
	$id=$_GET['catid'];
}
 ?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
		<?php 
			$query="SELECT * FROM tbl_post where cat='$id'";
			$category=$dbcon->select($query);
			if ($category) {
				while ($result=$category->fetch_assoc()) {?>
<h2 style="text-align:center;color:red;text-transform:uppercase">Archive for the <?php echo $result['title'];?> category</h2>
		<div class="samepost clear">
	
		<h2><a href="post.php?postid=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></h2>
		<h4><?php echo $dfm->formatdate($result['date']); ?>
		<a href="#">
		<?php echo $result['author']; ?></a>
		</h4>
		 <a href="#">
		<img src="admin/<?php echo $result['image'];?>">
		 </a>
		<?php echo $dfm->textshort($result['body'],120); ?>
		<div class="readmore clear">
			<a href="post.php?postid=<?php echo $result['id']; ?>">Read More</a>
		</div>
		</div>
			<?php } }
				else{?>
					<h2 style=color:green>
			<?php echo "No post found in this category"; ?>
			</h2>
				<?php }
			?>
		</div>
			
		<!-- start sidebar -->
			<?php include 'inc/sitebar.php';?>
		<!-- end sidebar -->
	</div>
	<!-- end contentsection -->
<?php include 'inc/footer.php';?>