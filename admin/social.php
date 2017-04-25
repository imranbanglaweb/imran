<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        
        <div class="grid_9">
		
            <div class="box round first grid">
                <h2>Update Social Media</h2>
<?php 
if ($_SERVER['REQUEST_METHOD']== 'POST') {
    $fb=mysqli_real_escape_string($dbcon->link,$_POST['fb']);
    $tt=mysqli_real_escape_string($dbcon->link,$_POST['tt']);
    $linkdin=mysqli_real_escape_string($dbcon->link,$_POST['link']);
    $gp=mysqli_real_escape_string($dbcon->link,$_POST['gp']);

    if ($fb == "" || $tt == "" || $linkdin == "" || $gp == "") {
        echo "<span class='error'>Field Not Must be empty</span>";

    }
   else{
    $query="UPDATE tbl_social 
    SET
    fb='$fb',
    tt='$tt',
    link='$linkdin',
    gp='$gp'
    WHERE id=1";
    $update_social = $dbcon->update($query);
  
        if ($update_social) {
         echo "<span class='success'>social link Updated Successfully.</span>";
        }else 
        {
         echo "<span class='error'>social link Not Updated !</span>";
        }
}
}
?>
                <div class="block"> 
                 <?php 
                    $query="SELECT * FROM tbl_social";
                    $social=$dbcon->select($query);
                  if ($social) {
                while ($row=$social->fetch_assoc()) { ?>              
                 <form action="" method="post">
                
                    <table class="form">					
                        <tr>
                            <td>
                                <label>
                                <i class="fa fa-facebook"></i>
                                Facebook</label>
                            </td>
                            <td>
                            <input type="text" 
                            value="<?php echo $row['fb'];?>" class="medium" name="fb" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label> 
                                <i class="fa fa-twitter"></i>Twitter
                                </label>
                            </td>
                            <td>
                                <input type="text" 
                            value="<?php echo $row['tt'];?>" class="medium" name="tt" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>
                                 <i class="fa fa-linkedin-square" aria-hidden="true"></i>
                                LinkedIn
                                </label>
                            </td>
                            <td>
                                <input type="text" 
                            value="<?php echo $row['link'];?>" class="medium" name="link" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>
                                 <i class="fa fa-google-plus-official" aria-hidden="true"></i>
                                Google Plus
                                </label>
                            </td>
                            <td>
                               <input type="text" 
                            value="<?php echo $row['gp'];?>" class="medium" name="gp" />
                            </td>
                        </tr>
						
						 <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    
                    </form>
                    <?php }}?>
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
 <?php include 'inc/footer.php';?>
