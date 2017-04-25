<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_9">
            <div class="box round first grid">
                <h2>Inbox</h2>
<?php 
if (isset($_GET['delid'])) {
	$delid=$_GET['delid'];
	$query="DELETE FROM tbl_email
	 WHERE id='$delid'";
	 $del=$dbcon->delete($query);
	  if ($del) {
		echo "<span class='success'>Deleted successfully</span>";
		   }
		   else{
		    echo "No Deleted ";
		   }
		                }
 ?>
<?php 
if (isset($_GET['seenid'])) {
	$seenid=$_GET['seenid'];
	$query ="UPDATE  tbl_contact 
     SET
 	 status=1
     WHERE id='$seenid'";
     $updateid=$dbcon->update($query);
     if ($updateid) {
     	echo "<span style='color:green'>Your Massage Seen successfully</span>";
     }
     else{
     	echo "Your Massage not Seen successfully";
     }
}
 ?>
 <?php 
if (isset($_GET['unseenid'])) {
	$unseenid=$_GET['unseenid'];
	$query ="UPDATE  tbl_contact 
     SET
 	 status=0
     WHERE id='$unseenid'";
     $updateid=$dbcon->update($query);
     if ($updateid) {
     	echo "<span style='color:green'>Your Massage UnSeen successfully</span>";
     }
     else{
     	echo "Your Massage not Seen successfully";
     }
}
 ?>
 <?php 
if (isset($_GET['delid'])) {
	$delid=$_GET['delid'];
	$query="DELETE FROM tbl_contact
	 WHERE id='$delid'";
	 $del=$dbcon->delete($query);
	  if ($del) {
		echo "<span class='success'>Deleted successfully</span>";
		   }
		   else{
		    echo "No Deleted ";
		   }
		                }
 ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>

							<th width="10%">F Name</th>
							<th width="10%">L Name</th>
							<th width="10%">Email</th>
							<th width="20%">Content</th>
							<th width="20%">Action</th>

						</tr>
					</thead>
					
					<tbody>
					<?php 
						$query="SELECT * FROM tbl_contact WHERE status=0
						order by id desc";
						$contact=$dbcon->select($query);
						if ($contact) {
							while ($data=$contact->fetch_assoc()) {?>
						<tr class="odd gradeX">
						<td><?php echo $data['firstname'];?></td>
						<td><?php echo $data['lastname'];?></td>
						<td><?php echo $data['email'];?></td>
						<td><?php echo $data['body'];?></td>
						<td>
						<i class="fa fa-street-view" aria-hidden="true"></i>
				<a href="viewmsg.php?msgid=<?php echo $data['id'];?>">
						View
						|| <a href="replymsg.php?msgid=<?php echo $data['id']?>">
						<i class="fa fa-reply aria-hidden="true"></i>
						Reply</a>
						</a> || 
						<a onclick="return confirm('Are you sure to moved to seen box')" href="?seenid=<?php echo $data['id'];?>">
						<i class="fa fa-inbox" aria-hidden="true"></i>
						Seen</a>

						</td>
						</tr>
					<?php } } ?>
					</tbody>
					 
				</table>
				<table class="data display datatable" id="example">
					<thead>

							<th width="10%">F Name</th>
							<th width="10%">L Name</th>
							<th width="10%">Email</th>
							<th width="20%">Content</th>
							<th width="35%">Action</th>

						</tr>
					</thead>
					
					<tbody>
					<?php 
						$query="SELECT * FROM tbl_contact WHERE status=1
						order by id desc";
						$contact=$dbcon->select($query);
						if ($contact) {
							while ($data=$contact->fetch_assoc()) {?>
						<tr class="odd gradeX">
						<td><?php echo $data['firstname'];?></td>
						<td><?php echo $data['lastname'];?></td>
						<td><?php echo $data['email'];?></td>
						<td><?php echo $data['body'];?></td>
						<td>
				<a href="viewmsg.php?msgid=<?php echo $data['id'];?>">
				<i class="fa fa-street-view" aria-hidden="true"></i>
						View
						|| <a onclick="return confirm('Are you sure to Deleted')" href="?delid=<?php echo $data['id']?>">
						<i class="fa fa-remove" aria-hidden="true"></i>
						Delete</a>
						</a> || 
						<a href="?seenid=<?php echo $data['id'];?>">
						<i class="fa fa-inbox" aria-hidden="true"></i>
						Seen</a> ||
						<a href="?unseenid=<?php echo $data['id'];?>">
						<i class="fa fa-recycle" aria-hidden="true"></i>Unseen</a>

						</td>
						</tr>
					<?php } } ?>
					</tbody>
					 
				</table>
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
  
