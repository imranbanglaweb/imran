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
    $to=$dfm->validation($_POST['email']);
    $formemail=$dfm->validation($_POST['formemail']);
    $subject=$dfm->validation($_POST['subject']);
    $body=$dfm->validation($_POST['body']);
    $sendemil=mail($to, $subject, $body,$formemail);
        if ($sendemil) {
            echo "<span>Your message send successfully.</span>";
        }
        else{
            echo "Your message not sent";
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
            <label>To</label>
        </td>
        <td>
            <input readonly type="text" 
            value ="<?php echo $data['email'] ;?>" 
            class="medium" name="email" />
        </td>
    </tr>
    <tr>
        <td>
            <label>From</label>
        </td>
        <td>
            <input type="text"
            placeholder="Enter your Email"
             class="medium" name="formemail" />
        </td>
    </tr>
    <tr>
        <td>
            <label>Subject</label>
        </td>
        <td>
            <input type="text" placeholder="Enter your Subject"
             class="medium" name="subject" />
        </td>
    </tr>
    <tr>
        <td>
            <label>Content</label>
        </td>
        <td>
            <textarea class="tinymce" name="body">
            </textarea>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <input type="submit" name="submit" Value="Send" />
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
