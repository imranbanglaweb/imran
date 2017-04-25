<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
if (!isset($_GET['slideid']) || $_GET['slideid'] == NULL) {
    echo "<script>window.location='sliderlist.php';</script>";
}
else{
    $slideid=$_GET['slideid'];
}
 ?>
<div class="grid_9">
<div class="box round first grid">
<h2>Edit Post</h2>

<?php 
if ($_SERVER['REQUEST_METHOD']== 'POST') {
    $title=mysqli_real_escape_string($dbcon->link,$_POST['title']);
    $permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_temp = $_FILES['image']['tmp_name'];
    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "upload/sliders".$unique_image;
 
    if ($title == "") {
        echo "<span class='error'>Field Not Must be empty</span>";

    }
    else{
    if (!empty($file_name)) {
		if($file_size >1048567) {
     echo "<span class='error'>Image Size should be less then 1MB!
     </span>";
    } 
    elseif (in_array($file_ext, $permited) === false) {
     echo "<span class='error'>You can upload only:-"
     .implode(', ', $permited)."</span>";
 }
    else{
    move_uploaded_file($file_temp, $uploaded_image);
    $query="UPDATE tbl_slider 
    SET
    title='$title',
    image='$uploaded_image'
    WHERE id='$slideid'";
    $update_slider = $dbcon->update($query);
  
    if ($update_slider) {
     echo "<span class='success'>Slider Updated Successfully.
     </span>";
    }else 
    {
     echo "<span class='error'>slider Not Updated !</span>";
    }
}



  }
  else{
    $query="UPDATE tbl_slider 
    SET
    title='$title'
    WHERE id=$slideid";
    $update_slider = $dbcon->update($query);
    if ($update_slider) {
     echo "<span class='success'>slider Updated Successfully.
     </span>";
    }else 
    {
     echo "<span class='error'>slider Not Updated !</span>";
    }


 	}
  }

}
?>
<div class="block"> 
<?php 
	$query="SELECT * FROM tbl_slider WHERE id='$slideid' order by id desc";
	$slide=$dbcon->select($query);
	if ($slide) {
		while ($row=$slide->fetch_assoc()){ ?>
		             
<form action="" method="post" enctype="multipart/form-data">
<table class="form">
   
    <tr>
        <td>
            <label>Title</label>
        </td>
        <td>
            <input type="text" 
            value="<?php echo $row['title'];?>" class="medium" name="title" />
        </td>
    </tr>
    <tr>
        <td>
            <label>Upload Image</label>
        </td>
        <td>
        <img src="<?php echo $row['image'];?>" height="100px" width="250px">
        <br>
            <input type="file" name="image" />
        </td>
    </tr>
	<tr>
        <td></td>
        <td>
            <input type="submit" name="submit" Value="Save" />
        </td>
    </tr>
</table>
</form>
<?php } }?> 
</div>
</div>
</div>
<div class="clear">
</div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function () {
    setupTinyMCE();
    setDatePicker('date-picker');
    $('input[type="checkbox"]').fancybutton();
    $('input[type="radio"]').fancybutton();
});
</script>
<script type="text/javascript">
$(document).ready(function () {
    setupLeftMenu();
    setSidebarHeight();
});
</script>
<!-- /TinyMCE -->
<style type="text/css">
#tinymce{font-size:15px !important;}
</style>
<?php include 'inc/footer.php';?>
