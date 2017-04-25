<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_9">
            <div class="box round first grid">
                <h2>Category List</h2>
<?php 
if (isset($_GET['delid'])) {
	$delid=$_GET['delid'];
	$query="DELETE FROM tbl_cate
	 WHERE id='$delid'";
	 $delcate=$dbcon->delete($query);
	  if ($delcate) {
		echo "<span class='success'>Deleted category</span>";
		   }
		   else{
		    echo "no Deleted category";
		   }
		                }
 ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					
					<tbody>
					<?php 
						$query="SELECT * FROM tbl_cate";
						$category=$dbcon->select($query);
						if ($category) {
							$i=0;
							while ($row=$category->fetch_assoc()) {
								$i++;
								?>
		<tr class="odd gradeX">
		<td><?php echo $i;?></td>
		<td><?php echo $row['name'];?></td>
		<td>
		<i class="fa fa-edit"></i>
		<a href="edicat.php?catid=<?php echo $row['id'];?>">
		Edit</a>
		 ||<a onclick="return confirm('Are you sure to Deleted');" href="?delid=<?php echo $row['id'];?>">
		 <i class="fa fa-trash"></i>
		 Delete</a>
		</td>
		</tr>
					<?php } } ?>
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
