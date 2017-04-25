<?php 
    ob_start(); 
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
	$username=$dfm->validation($_POST['username']);
	$password=$dfm->validation(md5($_POST['password']));
$username=mysqli_real_escape_string($dbcon->link,$username);
$password=mysqli_real_escape_string($dbcon->link,$password);
	$query="SELECT * FROM tbl_user WHERE username='$username' AND password='$password'";
	$result=$dbcon->select($query);
	if ($result !=false) {
		// $value=mysqli_fetch_array($result);
		$value=$result->fetch_assoc();
			Session::set("login",true);
			// Session::set("name",$value['name']);
			Session::set("username",$value['username']);
			// Session::set("userid",$value['userid']);
			// Session::set("role",$value['role']);
			// Session::set("id",$value['id']);
		    // Session::set("name",$value['name']);
			header("Location:index.php");
			exit();


	}
	else{
echo "<span style='color:red;font-size:16px'>username and password doesnt match..</span>";

	}
			
}
?>
		<form action="" method="post">
			<h1>Admin Login</h1>
			<div>
				<i class="fa fa-user"></i>
				<input type="text" placeholder="Username" required="" name="username"/>
			</div>
			<div>
			<i class="fa fa-lock"></i>
				<input type="password" placeholder="Password" required="" name="password"/>
			</div>
			<div>
				<!-- <i class="fa fa-sign-in"></i> -->
				<input type="submit" value="Log in" />
				
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="forgetpass.php">Forget Password !</a>
		</div><!-- button -->
		<div class="button">
			<a href="http://imranweb-bd.com">
				Imranweb-bd.com
			</a>
		</div><!-- button -->

	</section><!-- content -->
</div><!-- container -->
</body>
</html>