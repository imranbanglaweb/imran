<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
if (!isset($_GET['pageid']) || $_GET['pageid'] == NULL) {
    echo "<script>window.location='postlist.php';</script>";
}
else{
    $postid=$_GET['pageid'];
}
 ?>
<div class="grid_9">

<div class="box round first grid">
<h2>Add New Page</h2>
<?php 
if ($_SERVER['REQUEST_METHOD']== 'POST') {
    $pageid=$_GET['pageid'];
    $name=mysqli_real_escape_string($dbcon->link,$_POST['name']);
    $body=mysqli_real_escape_string($dbcon->link,$_POST['body']);
    if ($name == "" || $body == "") {
        echo "<span class='error'>Field Not Must be empty</span>";
    }
    else{
    $query ="UPDATE tbl_page
    SET
    name='$name',
    body='$body'
    WHERE id='$pageid'";
    $page_rows = $dbcon->update($query);
  
    if ($page_rows) {
     echo "<span class='success'>Page Updated Successfully.
     </span>";
    }else 
    {
     echo "<span class='error'>Page Not Updated !</span>";
    }
}
}
?>
<div class="block">               
<form action="" method="post">
<table class="form">
<?php 
    $pageid=$_GET['pageid'];
    $query="SELECT * FROM tbl_page WHERE id='$pageid'";
    $page=$dbcon->select($query);
    if ($page) {
        while ($result=$page->fetch_assoc()) { ?> 
    <tr>
        <td>
            <label>Page</label>
        </td>
        <td>
            <input type="text"
            value="<?php echo $result['name'];?>"
             class="medium" name="name" />
        </td>
    </tr>
    <tr>
<td>
</td>
    </tr>
    <tr>
        <td style="vertical-align: top; padding-top: 9px;">
            <label>Content</label>
        </td>
        <td>
            <textarea class="tinymce" name="body">
                <?php echo $result['body'];?>
            </textarea>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <input type="submit" value="Updated">
        </td>
    </tr>
     <?php  }}?>
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
