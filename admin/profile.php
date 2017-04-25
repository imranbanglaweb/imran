<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
$userid   = Session::get('id');
$userroll = Session::get('role');
 ?>
<div class="grid_9">
<div class="box round first grid">
<h2>User Profile</h2>

<?php 
 if ($_SERVER['REQUEST_METHOD']== 'POST') {
 $name       =$dfm->validation($_POST['name']);
 $username   =$dfm->validation($_POST['username']);
 $email      =$dfm->validation($_POST['email']);
 $details    =$_POST['details'];

$name=mysqli_real_escape_string($dbcon->link,$name);
$username=mysqli_real_escape_string($dbcon->link,$username);
$email=mysqli_real_escape_string($dbcon->link,$email);
$details=mysqli_real_escape_string($dbcon->link,$details);


if (empty($username)) {
echo "<span class='error'>Field Not empty</span>";
    }

    else{
    $query="UPDATE tbl_user
    SET
    name='$name',
    username='$username',
    email='$email',
    details='$details'
    WHERE id='$userid'";
    $update_post = $dbcon->update($query);
  
    if ($update_post) {
     echo "<span class='success'>User Updated Successfully.
     </span>";
    }else 
    {
     echo "<span class='error'>User Not Updated !</span>";
    }
}

}
?>
<div class="block"> 
		             
<form action="" method="post">
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
            <input type="text" 
            value="<?php echo $result['name'];?>" class="medium" name="name" />
        </td>
    </tr>
    <tr>
        <td>
            <label>Username</label>
        </td>
        <td>
            <input type="text" 
            value="<?php echo $result['username'];?>" class="medium" name="username" />
        </td>
    </tr>
    <tr>
        <td>
            <label>Email</label>
        </td>
        <td>
            <input type="text" 
            value="<?php echo $result['email'];?>" class="medium" name="email" />
        </td>
    </tr>
    <tr>
        <td style="vertical-align: top; padding-top: 9px;">
            <label>Details</label>
        </td>
        <td>
            <textarea class="tinymce" name="details">
            	<?php echo $result['details'];?>
            </textarea>
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
