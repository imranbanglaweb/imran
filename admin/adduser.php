<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_9">
      <div class="box round first grid">
          <h2>Add New User</h2>
         <div class="block copyblock"> 
<!-- <?php 
  if(!Session::get('role') == '0'){
    echo "<script>window.location='index.php';</script>";

  }
?> -->
<?php 
 if ($_SERVER['REQUEST_METHOD']== 'POST') {
 $username=$dfm->validation($_POST['username']);
 $password=$dfm->validation(md5($_POST['password']));
 $role=$dfm->validation($_POST['role']);
 $email=$dfm->validation($_POST['email']);

$username=mysqli_real_escape_string($dbcon->link,$username);
$password=mysqli_real_escape_string($dbcon->link,$password);
$role=mysqli_real_escape_string($dbcon->link,$role);
$email=mysqli_real_escape_string($dbcon->link,$email);
if (empty($username) || empty($password)
 || empty($role) || empty($email)) {
echo "<span class='error'>Field Not empty</span>";
    }
    else{

  $mailquery ="SELECT * FROM tbl_user 
              WHERE email='$email' limit 1";
  $mailcheck=$dbcon->select($mailquery);
    if ($mailcheck!=false) {
    echo "<span class='error'>Email already exists</span>";
      }
    else
    {
      $query="INSERT INTO tbl_user
      (username,password,role,email) VALUES
      ('$username','$password','$role','$email')";
      $userinsert=$dbcon->insert($query);

     if ($userinsert) {
echo "<span class='success'>User Added</span>";
     }
     else{
      echo "no User added";
     }
    }

  }
}
?>
<form action="" method="POST">
  <table class="form">	
      <tr>
        <td><label>User Name:</label></td>
          <td>
          <input type="text" placeholder="Enter User Name..." class="medium" name="username" />
          </td>
      </tr>
      <tr>
        <td><label>Password:</label></td>
          <td>
              <input type="password" placeholder="Enter Password..." class="medium" name="password" />
          </td>
      </tr>
      <tr>
        <td><label>Email:</label></td>
          <td>
              <input type="text" placeholder="Enter Email..." class="medium" name="email" />
          </td>
      </tr>
      <tr>
        <td><label>User role</label></td>
        <td>
          <select id="select" name="role">
            <option>Select User Role</option>
            <option value="0">admin</option>
            <option value="1">Author</option>
            <option value="2">Editor</option>
          </select>
        </td>
      </tr>
      <tr> 
      <td></td>
          <td>
          <i class="fa fa-check-square" aria-hidden="true"></i>
              <input type="submit" name="submit" Value="Added" />
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
 <?php include 'inc/footer.php';?>