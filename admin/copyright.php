<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_9">
		
            <div class="box round first grid">
                <h2>Update Copyright Text</h2>
                <?php 
if ($_SERVER['REQUEST_METHOD']== 'POST') {
    $footer_text=mysqli_real_escape_string($dbcon->link,$_POST['text']);

    if ($footer_text == "") {
        echo "<span class='error'>Field Not Must be empty</span>";

    }
   else{
    $query="UPDATE tbl_copyright
    SET
    footer_text='$footer_text'
    WHERE id=1";
    $footer_text = $dbcon->update($query);
  
        if ($footer_text) {
         echo "<span class='success'>footer link Updated Successfully.</span>";
        }else 
        {
         echo "<span class='error'>footer link Not Updated !</span>";
        }
}
}
?>
                <div class="block copyblock"> 
                 <form action="" method="post">
                    <table class="form">
                    <?php 
                     $query="SELECT * FROM tbl_copyright WHERE id=1";
                    $copy=$dbcon->select($query);
                    if ($copy) 
                    {
                        while ($data=$copy->fetch_assoc()) {?>			
                        <tr>
                             <td>
                               <input type="text" 
                            value="<?php echo $data['footer_text'];?>" class="medium" name="text" />
                            </td>
                        </tr>
						
						 <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                     <?php }}?>
                    </form>
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
<?php include 'inc/footer.php';?>