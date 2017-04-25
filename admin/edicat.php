<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
if (!isset($_GET['catid']) || $_GET['catid'] == NULL) {
	echo "<script>window.location='catlist.php';</script>";
}
else{
	$catid=$_GET['catid'];
}
 ?>
        <div class="grid_9">
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
<?php 
if ($_SERVER['REQUEST_METHOD']== 'POST') {
    $catname=$_POST['name'];
$catname=mysqli_real_escape_string($dbcon->link,$catname);
  if (empty($catname)) {
    echo "<span class='error'>Field Not empty</span>";
  }
  else
  {
    $query="UPDATE tbl_cate
    SET name='$catname' WHERE id='$catid'";
    $catup=$dbcon->update($query);
   if ($catup) {
echo "<span class='success'>Category Updated</span>";
   }
   else{
    echo "no Category added";
   }
  }

}

?>
     <?php 
     	$query="SELECT * FROM tbl_cate WHERE id='$catid'";
     	$category=$dbcon->select($query);
     	while ($row=$category->fetch_assoc()) { ?>
<form action="" method="POST">
<table class="form">				
    <tr>
    <td>
        <input type="text" class="medium" name="name" value="<?php echo $row['name'];?>" />
    </td>
    </tr>
	<tr> 
        <td>
            <input type="submit" name="submit" Value="Updated" />
        </td>
    </tr>
</table>
</form>
        <?php }?>
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
 <?php include 'inc/footer.php';?>