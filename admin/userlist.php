<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_9">
    <div class="box round first grid">
        <h2>User List</h2>
<?php 
if (isset($_GET['delid'])) {
	$delid=$_GET['delid'];
	$query="DELETE FROM tbl_user
	 WHERE id='$delid'";
	 $deluser=$dbcon->delete($query);
	  if ($deluser) {
		echo "<span class='success'>Deleted User</span>";
		   }
		   else{
		    echo "No Deleted User";
		   }
		                }
 ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>S No.</th>
							<th>Name</th>
							<th>Username</th>
							<th>Email</th>
							<th>Details</th>
							<th>Roll</th>
							<th>Action</th>
						</tr>
					</thead>
					
					<tbody>
					<?php 
						$query="SELECT * FROM tbl_user";
						$user=$dbcon->select($query);
						if ($user) {
							$i=0;
							while ($row=$user->fetch_assoc()) {
								$i++;
								?>
		<tr class="odd gradeX">
		<td><?php echo $i;?></td>
		<td><?php echo $row['name'];?></td>
		<td><?php echo $row['username'];?></td>
		<td><?php echo $row['email'];?></td>
        <td><?php echo $row['details'];?></td>
		<td><?php 

		if ($row['role']=='0') {
			echo "Admin";
		}
		elseif ($row['role']=='1') {
			echo "Author";
		} 
		elseif ($row['role']=='2') {
			echo "Editor";
		}

		?>
			
		</td>
		<td>
		<i class="fa fa-edit"></i>
		<a href="edituser.php?userid=<?php echo $row['id'];?>">
		View</a>
		 ||
		 <?php 
            if (Session::get('role') =='0') {?>
		 <a onclick="return confirm('Are you sure to Deleted');" href="?delid=<?php echo $row['id'];?>">
		 <i class="fa fa-trash"></i>
		 Delete</a>
		  <?php } ?>
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
