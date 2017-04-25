<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_9">

<div class="box round first grid">
<h2>Add New Post</h2>
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
    $uploaded_image = "upload/sliders/".$unique_image;
    if ($title == "" || $file_name == "") {
        echo "<span class='error'>Field Not Must be empty</span>";
    }
   elseif ($file_size >1048567) {
     echo "<span class='error'>Image Size should be less then 1MB!
     </span>";
    } 
    elseif (in_array($file_ext, $permited) === false) {
     echo "<span class='error'>You can upload only:-"
     .implode(', ', $permited)."</span>";
 }
    else{
    move_uploaded_file($file_temp, $uploaded_image);
    $query = "INSERT INTO tbl_slider
    (title,image) 
    VALUES('$title','$uploaded_image')";
    $inserted_rows = $dbcon->insert($query);
    
  
    if ($inserted_rows) {
     echo "<span class='success'>slider Inserted Successfully.
     </span>";
    }else 
    {
     echo "<span class='error'>slider Not Inserted !</span>";
    }
}
}
?>
<div class="block">               
<form action="addslider.php" method="post" enctype="multipart/form-data">
<table class="form">
   
    <tr>
        <td>
        <i class="fa fa-sliders" aria-hidden="true"></i>
            <label>Title</label>
        </td>
        <td>
            <input type="text" placeholder="Enter Post Title..." class="medium" name="title" />
        </td>
    </tr>
    <tr>
        <td>
        <i class="fa fa-upload" aria-hidden="true"></i>
            <label>Add Slider Image</label>
        </td>
        <td>
            <input type="file" name="image" />
        </td>
    </tr>
	<tr>
        <td></td>
        <td>
        <i class="fa fa-check-square" aria-hidden="true"></i>
            <input type="submit" name="submit" Value="Add" />
        </td>
    </tr>
</table>
</form>
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
