<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_9">
            <div class="box round first grid">
                <h2>Post List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="5%">No</th>
							<th width="10%">Page</th>
							<th width="10%">Content</th>
							<th width="10%">Action</th>
						</tr>
					</thead>
					
					<tbody>
					<?php 
                	$query="SELECT * FROM tbl_page";
					$page=$dbcon->select($query);
					if ($page) {
						$i=0;
				while ($result=$page->fetch_assoc()) {
						$i++;
						?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['name'];?></td>
							<td>
						<?php echo $dfm->textshort($result['body'],20);?>
							</td>
							<td>
							<i class="fa fa-edit"></i>
							<a href="page.php?pageid=<?php echo $result['id'];?>">
							Edit</a> || 
							<i class="fa fa-remove"></i>
							<a href="">Delete</a>
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
