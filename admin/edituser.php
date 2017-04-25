<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
if (!isset($_GET['userid']) || $_GET['userid'] == NULL) {
  echo "<script>window.location='userlist.php';</script>";
}
else{
  $userid=$_GET['userid'];
}
 ?>
<div class="grid_9">
<div class="box round first grid">
<h2>Update Profile</h2>

<?php 
 if ($_SERVER['REQUEST_METHOD']== 'POST') {
  echo "<script>window.location='userlist.php';</script>";

}
?>
<div class="block"> 
                 
<form action="" method="post" class="user">
<?php 
    $query="SELECT * FROM tbl_user WHERE id='$userid'";
    $post=$dbcon->select($query);
    if ($post) {
        while ($result=$post->fetch_assoc()){ ?>
<table class="form">
   
    <tr>
        <td>
            <label>Name</label>
        </td>
        <td>
            <input readonly type="text" 
            value="<?php echo $result['name'];?>" class="medium" name="name" />
        </td>
    </tr>
    <tr>
        <td>
            <label>Username</label>
        </td>
        <td>
            <input readonly type="text" 
            value="<?php echo $result['username'];?>" class="medium" name="username" />
        </td>
    </tr>
    <tr>
        <td>
            <label>Email</label>
        </td>
        <td>
            <input readonly type="text" 
            value="<?php echo $result['email'];?>" class="medium" name="email" />
        </td>
    </tr>
    <tr>
        <td style="vertical-align: top; padding-top: 9px;">
            <label>Details</label>
        </td>
        <td>
          <textarea readonly class="tinymce" name="details">
            <?php echo $result['details'];?>
          </textarea>
        </td>
    </tr>

  <tr>
        <td></td>
        <td>
          <input readonly type="submit" name="submit"
         Value="Ok" />
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
