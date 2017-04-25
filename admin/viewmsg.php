<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_9">
<?php 
if (!isset($_GET['msgid']) || $_GET['msgid'] == NULL) {
	echo "<script>window.location='inbox.php';</script>";
}
else{
	$msgid=$_GET['msgid'];
}
 ?>
<div class="box round first grid">
<h2>Add New Page</h2>
<?php 
if ($_SERVER['REQUEST_METHOD']== 'POST') {
 $firstname=mysqli_real_escape_string($dbcon->link,$_POST['firstname']);
 $lastname=mysqli_real_escape_string($dbcon->link,$_POST['lastname']);
 $email=mysqli_real_escape_string($dbcon->link,$_POST['email']);
 $body=mysqli_real_escape_string($dbcon->link,$_POST['body']);
    if ($firstname == " " || $lastname == " " || $body == " ") {
        echo "<span class='error'>Field Not Must be empty</span>";
    }
    else{
    $query ="UPDATE  tbl_contact 
    SET
    firstname='$firstname',
    lastname='$lastname',
    email='$email',
    body='$body'
    WHERE id='$msgid'";
    $contact=$dbcon->update($query);
  
    if ($contact) {
		header("Location:inbox.php");
    }else 
    {
     echo "<span class='error'>Page Not Added !</span>";
    }
}
}
?>
<div class="block">               
<form action="" method="post">
<table class="form"> 
<?php 
	$query="SELECT * FROM tbl_contact WHERE id='$msgid'";
	$contact=$dbcon->select($query);
	if ($contact) {
		while ($data=$contact->fetch_assoc()) {?>
    <tr>
        <td>
            <label>First Name</label>
        </td>
        <td>
            <input readonly type="text" 
            value ="<?php echo $data['firstname'] ;?>" 
            class="medium" name="firstname" />
        </td>
    </tr>
    <tr>
        <td>
            <label>Last Name</label>
        </td>
        <td>
            <input readonly type="text"
            value ="<?php echo $data['lastname'] ;?>" 
             class="medium" name="lastname" />
        </td>
    </tr>
      <tr>
        <td>
            <label>Email</label>
        </td>
        <td>
            <input readonly type="text" 
            	value ="<?php echo $data['email'] ;?>" 
            class="medium" name="email" />
        </td>
    </tr>
    <tr>
	<td>
	</td>
    </tr>
    <tr>
        <td>
            <label>Content</label>
        </td>
        <td>
            <textarea readonly class="tinymce" name="body">
            <?php echo $data['body'] ;?>
            </textarea>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <input type="submit" name="submit" Value="View" />
        </td>
    </tr>
<?php } }?>
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
