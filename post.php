<?php include 'inc/header.php';?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
<?php 
	$postid=$_GET['postid'];
	$query="SELECT * FROM tbl_post where id='$postid'";
	$post=$dbcon->select($query);
	if($post) {
		while ($result=$post->fetch_assoc()) {?>
	<div class="samepost clear">		
	<h2>
	<a href="post.php?postid=<?php echo $result['id']; ?>"><?php echo $result['title']; ?>
	</a>
	</h2>
<h4>
<?php echo $dfm->formatdate($result['date']); ?>
<a href="#">
<?php echo $result['author']; ?>
</a>
</h4>
<a href="#"><img src="admin/<?php echo $result['image'];?>" height='300px' width='1000px'>
</a>
<p>
<?php echo $result['body']; ?>
</p>	
</div>
<!-- end samepost -->
<div class="relatedpost clear">
	<h2>Related Post</h2>
	<?php 
	$catid=$result['cat'];
	$rquery="SELECT * FROM tbl_post where cat='$catid'
	order by rand()";
	$rpost=$dbcon->select($rquery);
	if ($rpost) {
	while ($rresult=$rpost->fetch_assoc()) { ?>
	<a href="post.php?postid=<?php echo $result['id']; ?>">
		<img src="admin/<?php echo $rresult['image'];?>">
			</a>
<?php } } else
{ 
	echo "No related post category are avaiable";
	
	?>			
<?php }?>

	</div>
	 <?php } }  else { header("Location:404.php");
			}
?>
</div>
		<!-- end maincontent -->
		<!-- start sidebar -->
			<?php include 'inc/sitebar.php';?>
		<!-- end sidebar -->
	</div>
	<!-- end contentsection -->
<?php include 'inc/footer.php';?>