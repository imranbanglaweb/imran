<?php 
	include '../lib/session.php';
	Session::init();
?>
<?php include '../config/config.php';?>
<?php include '../lib/Database.php';?>
<?php include '../helpers/format.php';?>
<?php 
    $dbcon=new Database();
    // $session=new Session();
    $dfm=new Format();

?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
</head>
<body>
<div class="container">

	<section id="content">
	<?php 
		if ($_SERVER['REQUEST_METHOD']== 'POST') {
			$email = $dfm->validation($_POST['email']);
	$email = mysqli_real_escape_string($dbcon->link,$email);
			if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
				echo "Invalid email address";
			}
			else{
			$mailquery ="SELECT * FROM tbl_user 
              WHERE email='$email' limit 1";
  			$mailcheck=$dbcon->select($mailquery);
			if ($mailcheck !=false) {
				while ($value=$mailcheck->fetch_assoc()) {
					$userid=$value['id'];
					$username=$value['username'];
				}
				$text=substr($email, 0,3);
				$rand=rand(10000,99999);
				$newpass="$text$rand";
				$password=md5($newpass);
				$update="UPDATE tbl_user
						SET 
						password='$password'
						WHERE id='$userid'";
				$update_row=$dbcon->update($update);
				$to="$email";
				$from      ="imran@gmail.com";
				$headers   ="from :$from\n";
				$headers  .= 'MIME-Version: 1.0' . "\r\n";
				$headers  .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$subject="Your lost password";
				$message="Your username is ".$username." and
				password is ".$newpass." Please visit website to login ";
	$sendemail=mail($to, $subject, $message,$headers);
	if ($sendemail) {
echo "<span style='color:green;'>Please Check your email for new password.</span>";
	}
	else
	{
echo "<span style='color:red;'>Email Not send</span>";
	}

			}
				else{
	echo "<span style='color:red;'>
			Email Not exists.
		</span>";

	}
			
		}
}
 ?>
		<form action="" method="post">
			<h1>Password Recovery</h1>
			<div>
			<i class="fa fa-lock"></i>
				<input type="text" placeholder="Enter a valid email" required="" name="email"/>
			</div>
			<div>
				<!-- <i class="fa fa-sign-in"></i> -->
				<input type="submit" value="Send" />
				
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="login.php">Back Login Page</a>
		</div><!-- button -->
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->

	</section><!-- content -->
</div><!-- container -->
</body>
</html>