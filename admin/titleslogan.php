<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<style type="text/css">
    .left_side{
        float: left;
        width: 70%;

    }
    .right_side{
        float: left;
        width: 25%;
    }
</style>

        <div class="grid_9">
		
            <div class="box round first grid">
                <h2>Update Site Title and Description</h2>
                <?php 
if ($_SERVER['REQUEST_METHOD']== 'POST') {
    $title=mysqli_real_escape_string($dbcon->link,$_POST['title']);
    $slogan=mysqli_real_escape_string($dbcon->link,$_POST['slogan']);;
    $permited  = array('png','jpeg','jpg');
    $file_name = $_FILES['logo']['name'];
    $file_size = $_FILES['logo']['size'];
    $file_temp = $_FILES['logo']['tmp_name'];
    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $sameimage = 'logo'.'.'.$file_ext;
    $uploaded_image = "upload/".$sameimage;
 
    if ($title == "" || $slogan == "") {
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
    $query="UPDATE tbl_site_title
    SET
    title='$title',
    slogan='$slogan',
    logo='$uploaded_image'
    WHERE id=1";
    $update_post = $dbcon->update($query);
  
    if ($update_post) {
     echo "<span class='success'>Post Updated Successfully.
     </span>";
    }else 
    {
     echo "<span class='error'>Post Not Updated !</span>";
    }
}



  }
  else{
    $query="UPDATE tbl_site_title
    SET
    title='$title',
    slogan='$slogan'
    WHERE id=1";
    $update_post = $dbcon->update($query);
    if ($update_post) {
     echo "<span class='success'>Post Updated Successfully.
     </span>";
    }else 
    {
     echo "<span class='error'>Post Not Updated !</span>";
    }


    }
  }

}
?>
                 <?php 
                    $query="SELECT * FROM tbl_site_title WHERE id=1";
                    $slogan=$dbcon->select($query);
                    if ($slogan) {
                        while ($data=$slogan->fetch_assoc()) {?>
                <div class="block sloginblock"> 

                <div class="left_side">          
             <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                   					
                        <tr>
                            <td>
                            <i class="fa fa-bullseye" aria-hidden="true"></i>
                                <label>Website Title</label>
                            </td>
                            <td>
                                <input type="text" 
                                value="<?php echo $data['title'];?>" name="title" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                            <i class="fa fa-bullseye" aria-hidden="true"></i>
                                <label>Website Slogan</label>
                            </td>
                            <td>
                                <input type="text"
                                value="<?php echo $data['slogan'];?>" name="slogan" class="medium" />
                            </td>
                        </tr>
						 
						 <tr>
                            <td>
                            <i class="fa fa-bullseye" aria-hidden="true"></i>
                                <label>Upload Your Logo</label>
                            </td>
                            <td>
                            <input type="file" name="logo" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                            </td>
                            <td>
                            <i class="fa fa-save"></i>
                            <input type="submit" name="submit" Value="Update" />
                                
                            </td>
                        </tr>
                    </table>
                    
                    </form>
                     
                </div>
                <!-- left side -->
                
                <div class="right_side">
                    <img src="<?php echo $data['logo'];?>" height="100px" width="100px">
                </div>
                </div>
                <?php   } } ?>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
<?php include 'inc/footer.php';?>