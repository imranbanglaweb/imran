<?php include 'inc/header.php';?>
<?php include 'inc/slider.php';?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
		<?php 
			// pagination

			$par_page=2;
			if (isset($_GET['page'])) {
				$page=$_GET['page'];
			}
			else{
				$page=1;
			}
			$start_form=($page-1) * $par_page;

		//end pagination
		 ?>
		<?php 
	$query="SELECT * FROM tbl_post limit $start_form,$par_page";
			$post=$dbcon->select($query);
			if ($post) {
				while ($result=$post->fetch_assoc()) {?>
			<div class="samepost clear">
			
				<h2><a href="post.php?postid=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></h2>
				<h4>Published: <?php echo $dfm->formatdate($result['date']); ?>
				<a href="#">
				Author:<?php echo $result['author']; ?></a>
				</h4>
				 <a href="#">
	<img src="admin/<?php echo $result['image'];?>" height="80px" width="120px">
				 </a>
				<?php echo $dfm->textshort($result['body'],120); ?>
				<div class="readmore clear">
					<a href="post.php?postid=<?php echo $result['id']; ?>">Read More</a>
				</div>
			</div>
			<!-- end samepost -->
			<?php }?><!-- end while loop -->
<!-- pagination start -->
<?php 
	$query="SELECT * FROM tbl_post";
	$result=$dbcon->select($query);
	$total_rows=mysqli_num_rows($result);
	$total_pages=ceil($total_rows/$par_page);
echo "<span class='pagination'><a href='index.php?page=1'>".'First Page'."</a>";
for ($i = 1; $i <= $total_pages; $i++) { 
	echo "<a href='index.php?page=".$i."'>".$i."</a>";
};
echo "<a href='index.php?page=$total_pages'>".'Last Page'."</a></span>";?>
<!-- end pagination  -->

		<?php }
			else{
					// echo "No category found this post";
				header("Location:404.php");
					exit();
			}
		?>
		</div>
		<!-- start sidebar -->
			<?php include 'inc/sitebar.php';?>
		<!-- end sidebar -->
	</div>
	<!-- end contentsection -->
<?php include 'inc/footer.php';?>