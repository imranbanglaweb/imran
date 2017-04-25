<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_9">
  <div class="box round first grid">
      <h2>Add New Theme</h2>
     <div class="block copyblock"> 
<?php 
if ($_SERVER['REQUEST_METHOD']== 'POST') {
$theme=mysqli_real_escape_string($dbcon->link,$_POST['theme']);
    $query="UPDATE tbl_theme
    SET theme='$theme' WHERE id='1'";
    $theme=$dbcon->update($query);
   if ($theme) {
echo "<span class='success'>Theme Change successfully</span>";
   }
   else{
    echo "no Theme added";
   }


}
?>
<?php 
	$query="SELECT * FROM tbl_theme WHERE id='1'";
	$theme=$dbcon->select($query);
	while ($row=$theme->fetch_assoc()) { ?>
<form action="" method="POST">
<table class="form">				
    <tr>
    <td>
      <input <?php if ($row['theme'] =="default")
     { echo "checked";
    } ?>
    type="radio" name="theme" 
        value="default" />Default
    </td>
    </tr>
     <tr>
    <td>
        <input <?php if ($row['theme'] =="blue") { echo "checked";
    }?> type="radio" name="theme" 
        value="blue" />Blue
    </td>
    </tr>
     <tr>
    <td>
        <input <?php if ($row['theme'] =="green") { echo "checked";
    }?> type="radio" name="theme" 
        value="green" />Green
    </td>
    </tr>
     <tr>
    <td>
        <input <?php if ($row['theme'] =="red") { echo "checked";
    }?> type="radio" name="theme" 
        value="red" />Red
    </td>
    </tr>
	<tr> 
    <td>
        <input type="submit" name="submit" Value="Theme change" />
    </td>
    </tr>
</table>
</form>
<?php }?>
        </div>
    </div>
</div>
<div class="clear">
</div>
</div>
<?php include 'inc/footer.php';?>