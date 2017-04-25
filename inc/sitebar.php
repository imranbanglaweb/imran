<div class="sidebar clear">
			<div class="samesidebar clear">
				<h2>Categories</h2>
					<ul>
					<?php 
					$catequery="SELECT * FROM tbl_cate";
					$cat=$dbcon->select($catequery);
					if ($cat) 
					{
					while ( $result=$cat->fetch_assoc()) {?>
						<li>
						<a href="category.php?catid=<?php echo $result['id'];?>">
							<i class="fa fa-angle-double-right" aria-hidden="true"></i>
						<?php echo $result['name']; ?></a>
						</li>
							<?php }?>
						<?php }
							else{
								header("Location:404.php");
								exit();
							}
						?>
					</ul>
			
			</div>
			
			<div class="samesidebar clear">
				<h2>Latest articles</h2>
				<?php 
				$query="SELECT * FROM tbl_post limit 3";
				$post=$dbcon->select($query);
				if ($post) {
				while ($result=$post->fetch_assoc()) {?>
				<div class="popular clear">
					<h3>
					<a href="post.php?postid=<?php echo $result['id']; ?>"><?php echo $result['title']; ?>
					</a>
					</h3>
					<a href="post.php?postid=<?php echo $result['id']; ?>">
					<img src="admin/<?php echo $result['image'];?>">
			 		</a>
					<p>
					<?php echo $dfm->textshort($result['body'],80); ?>
					</p>	
				</div>
					
				
						<?php } }
						else{
							header("Location:404.php");
							exit();
						}
					?>
							
			</div>
			
		</div>