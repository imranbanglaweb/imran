<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_9">
            <div class="box round first grid">
                <h2>Slider List</h2>
               <?php 
				if (isset($_GET['slideid'])) {
					$slideid=$_GET['slideid'];
					$query="DELETE FROM tbl_slider
					 WHERE id='$slideid'";
					 $slideid=$dbcon->delete($query);
					  if ($slideid) {
						echo "<span class='success'>Deleted Slider Item</span>";
						   }
						   else{
						    echo "no Deleted Slider";
						   }
						                }
				 ?>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="10%">No</th>
							<th width="25%">Title</th>
							<th width="15%">Image</th>
							<th width="25%">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
                	$query="SELECT * FROM tbl_slider";
					$slider=$dbcon->select($query);
					if ($slider) {
						$i=0;
				while ($result=$slider->fetch_assoc()) {
						$i++;
					?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['title'];?></td>
							<td>
							<a href="#">
				<img src="<?php echo $result['image'];?>" height="40px" width="50px">
				 			</a>
				 			</td>
							<td>
							<i class="fa fa-edit"></i>
							<a href="editslider.php?slideid=<?php echo $result['id'];?>">
							Edit</a> || 
							<i class="fa fa-remove"></i>
		<a onclick="return confirm('Are you sure to Deleted');"  href="?slideid=<?php echo $result['id'];?>">Delete</a>
							</td>
						</tr>
						<?php }}?>
					</tbody>
					
				</table>
	
               </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
	<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
			setSidebarHeight();
        });
    </script>
<?php include 'inc/footer.php';?>
