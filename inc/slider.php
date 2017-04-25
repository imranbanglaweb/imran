<div class="slidersection templete clear">
        <div id="slider">
        	<?php 
                $query="SELECT * FROM tbl_slider order by id limit 5";
				$slider=$dbcon->select($query);
					if ($slider) {
				while ($result=$slider->fetch_assoc()) {?>
				<a href="#">
				<img src="admin/<?php echo $result['image'];?>" height="450px" width="960px" alt="<?php echo $result['title'];?>" title="<?php echo $result['title'];?>">
				 </a>
            	<?php }}?>
        </div>

</div>
<!-- end header -->