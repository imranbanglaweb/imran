<!-- start footer -->
	<div class="footersection templete clear">
	  <div class="footermenu clear">
		<ul>
		<h2>Pages</h2>
		 <?php 
        $query="SELECT * FROM tbl_page";
        $page=$dbcon->select($query);
        if ($page) {
		while ($result=$page->fetch_assoc()) { ?>
			<li><a href="#"><?php echo $result['name'];?></a></li>
			<?php }}?>
			<li><a href="contact.php">Contact</a></li>
		</ul>
	  </div>
	  <div class="footermenu clear">
	  		
					<ul>
					<h2>Categories</h2>
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
	  <div class="footermenu clear">
	  
	  <div class="social-footer">
	  <h2>Connect Social Links..</h2>
	  <div class="icon clear">
	  	 <?php 
                    $query="SELECT * FROM tbl_social";
                    $social=$dbcon->select($query);
                  if ($social) {
                while ($row=$social->fetch_assoc()) { ?>
				<a href="<?php echo $row['fb'];?>" target="_blank"><i class="fa fa-facebook"></i></a>
				<a href="<?php echo $row['tt'];?>" target="_blank"><i class="fa fa-twitter"></i></a>
				<a href="<?php echo $row['link'];?>" target="_blank"><i class="fa fa-linkedin"></i></a>
				<a href="<?php echo $row['gp'];?>" target="_blank"><i class="fa fa-google-plus"></i></a>
				<?php }}?>
		</div>
	  </div>
	  </div>
	  <div class="footer-copyright">
	  <?php 
     $query="SELECT * FROM tbl_copyright WHERE id=1";
    $copy=$dbcon->select($query);
    if ($copy) 
    {
        while ($data=$copy->fetch_assoc()) {?>	                
	  <a href="http://imranweb-bd.com" target="blank">
	  	<p>&copy; <?php echo $data['footer_text'];?></p>
	  </a>
	  <?php }}?>
	  </div>
	</div>
	<!-- end footer section -->
	<div class="fixedicon clear">
		<a href="http://www.facebook.com"><img src="images/fb.png" alt="Facebook"/></a>
		<a href="http://www.twitter.com"><img src="images/tw.png" alt="Twitter"/></a>
		<a href="http://www.linkedin.com"><img src="images/in.png" alt="LinkedIn"/></a>
		<a href="http://www.google.com"><img src="images/gl.png" alt="GooglePlus"/></a>
	</div>
<script type="text/javascript" src="js/scrolltop.js"></script>
</body>
</html>