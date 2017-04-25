<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_9">

<div class="box round first grid">
<h2>Add New Post</h2>
<?php 
if ($_SERVER['REQUEST_METHOD']== 'POST') {
    $title=mysqli_real_escape_string($dbcon->link,$_POST['title']);
    $cat=mysqli_real_escape_string($dbcon->link,$_POST['cat']);
    $body=mysqli_real_escape_string($dbcon->link,$_POST['body']);
    $author=mysqli_real_escape_string($dbcon->link,$_POST['author']);
    $tags=mysqli_real_escape_string($dbcon->link,$_POST['tags']);
$userid=mysqli_real_escape_string($dbcon->link,$_POST['userid']);
    $permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_temp = $_FILES['image']['tmp_name'];
    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "upload/".$unique_image;
    if ($title == "" || $cat == "" || $body == "" || $file_name == "" || $author == "" || $tags == "") {
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
    $query = "INSERT INTO tbl_post
    (cat,title,body,image,author,tags,userid) 
    VALUES('$cat','$title','$body','$uploaded_image','$author','$tags','$userid')";
    $inserted_rows = $dbcon->insert($query);
    
  
    if ($inserted_rows) {
     echo "<span class='success'>Post Inserted Successfully.
     </span>";
    }else 
    {
     echo "<span class='error'>Post Not Inserted !</span>";
    }
}
}
?>
<div class="block">               
<form action="addpost.php" method="post" enctype="multipart/form-data">
<table class="form">
   
    <tr>
        <td>
            <label>Title</label>
        </td>
        <td>
            <input type="text" placeholder="Enter Post Title..." class="medium" name="title" />
        </td>
    </tr>
 
    <tr>
        <td>
            <label>Category</label>
        </td>
<td>

    <select id="select" name="cat">
     <option>select category</option>
    <?php 
    $query="SELECT * FROM tbl_cate";
    $category=$dbcon->select($query);
    if ($category) {
        while ($result=$category->fetch_assoc()) { ?>

        <option value="<?php echo $result['id'];?>">
            <?php echo $result['name'];?>
        </option>
         <?php  }}?>
    </select>
   
</td>
    </tr>
    <tr>
        <td>
            <label>Upload Image</label>
        </td>
        <td>
            <input type="file" name="image" />
        </td>
    </tr>
    <tr>
        <td style="vertical-align: top; padding-top: 9px;">
            <label>Content</label>
        </td>
        <td>
            <textarea class="tinymce" name="body"></textarea>
        </td>
    </tr>
    <tr>
        <td>
            <label>Tags</label>
        </td>
        <td>
            <input type="text" placeholder="Enter Tags..." class="medium" name="tags" />
        </td>
    </tr>
     <tr>
        <td>
            <label>Author</label>
        </td>
        <td>
            <input type="text" placeholder="Enter author..." class="medium" name="author" />
            <input type="hidden" class="medium"
             name="userid"
            value="<?php echo Session::get('id');?>"/>
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
