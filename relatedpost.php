<div class="relatedpost clear">
	<h2>Related Post</h2>
	<?php 
	$catid=$result['cat'];
	$rquery="SELECT * FROM tbl_post where id=$catid";
	$rpost=$dbcon->select($rquery);
	if ($post) {
			while ($rresult=$rpost->fetch_assoc()) {?>
	<a href="post.php?postid=<?php echo $rresult['id']; ?>">
	<img src="admin/upload/<?php echo $result['image'];?>">
	</a>
	<?php }?><!-- end while loop -->

	<?php }
		else{
			echo "No reated post are available";
		}
	?>
</div>