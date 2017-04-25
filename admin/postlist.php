<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_9">
    <div class="box round first grid">
	<h2>Post List</h2>
<?php 
if (isset($_GET['delpost'])) {
$delpost=$_GET['delpost'];
$query="DELETE FROM tbl_post
 WHERE id='$delpost'";
 $delpost=$dbcon->delete($query);
  if ($delpost) {
	echo "<span class='success'>Deleted Post Item</span>";
	   }
	   else{
	    echo "no Deleted Post";
	   }
	                }
?>
<div class="block">  
    <table class="data display datatable" id="example">
	<thead>
		<tr>
			<th width="5%">No</th>
			<th width="10%">Title</th>
			<th width="10%">Category</th>
			<th width="15%">Content</th>
			<th width="10%">Image</th>
			<th width="10%">Author</th>
			<th width="5%">Tags</th>
			<th width="5%">Date</th>
			<th width="25%">Action</th>
		</tr>
	</thead>
 <?php 
$query="SELECT tbl_post.*,tbl_cate.name
FROM tbl_post INNER JOIN tbl_cate ON tbl_post.cat=
tbl_cate.id ORDER BY tbl_post.title DESC";
$post=$dbcon->select($query);
if ($post) {
	$i=0;
while ($result=$post->fetch_assoc()) {
	$i++;
?>
			<tbody>
				<tr class="odd gradeX">
					<td><?php echo $i;?></td>
					<td><?php echo $result['title'];?></td>
					<td><?php echo $result['name'];?></td>
					<td>
					<?php echo $dfm->textshort($result['body'],50);?>
					</td>
					<td>
					<a href="#">
			<img src="<?php echo $result['image'];?>" height="40px" width="50px">
						</a>
						</td>
					<td><?php echo $result['author'];?></td>
					<td><?php echo $result['tags'];?></td>
					<td><?php echo $result['date'];?></td>
					<td>
					<i class="fa fa-edit"></i>
			<a href="editpost.php?postid=<?php echo $result['id'];?>">
					Edit
			</a> || 
			<i class="fa fa-trash"></i>
			<a onclick="return confirm('Are you sure to Deleted');" href="?delpost=<?php echo $result['id'];?>">Delete</a>
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
