<?php include 'inc/header.php';?>
<?php 
	if ($_SERVER['REQUEST_METHOD']== 'POST') {
		$firstname=$dfm->validation($_POST['firstname']);
		$lastname=$dfm->validation($_POST['lastname']);
		$email=$dfm->validation($_POST['email']);
		$body=$dfm->validation($_POST['body']);

		$firstname=mysqli_real_escape_string($dbcon->link, $firstname);
		$lastname=mysqli_real_escape_string($dbcon->link, $lastname);
		$email=mysqli_real_escape_string($dbcon->link, $email);
		$body=mysqli_real_escape_string($dbcon->link,$body);
		$error="";
		if (empty($firstname)) {
			$error="First Name Not must be empty";
		}
		elseif (empty($lastname)) {
			$error="Last Name Not must be empty";
		}
		
		elseif (empty($body)) {
			$error="Subject Not must be empty";
		}
		
		elseif (empty($email)) {
			$error="Email Not must be empty";
		}
		elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
			$error="Invalid email address";
		}
		else{
			$query="INSERT INTO tbl_contact
			(firstname,lastname,email,body)
			values('$firstname','$lastname','$email','$body')";
			$insert=$dbcon->insert($query);
			if ($insert) {
				echo $msg="Your Message Successfully Send";
			}
			else{
				$error;
			}
			
		}
}
?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2>Contact us</h2>
				<?php
					if (isset($error)) {
						echo "<span style='color:red'>$error</span>";
					}
					if (isset($msg)) {
						echo "<span style='color:green'>$msg</span>";
					}
				?>
			<form action="" method="post">
				<table>
				<tr>
					<td>Your First Name:</td>
					<td>
					<input type="text" name="firstname" placeholder="Enter first name"/>
					</td>
				</tr>
				<tr>
					<td>Your Last Name:</td>
					<td>
					<input type="text" name="lastname" placeholder="Enter Last name" />
					</td>
				</tr>
				
				<tr>
					<td>Your Email Address:</td>
					<td>
					<input type="text" name="email" placeholder="Enter Email Address"/>
					</td>
				</tr>
				<tr>
					<td>Your Message:</td>
					<td>
					<textarea name="body"></textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
					<input type="submit" name="submit" value="Submit"/>
					</td>
				</tr>
				</table>
				<form>				
 			</div>

		</div>
		<!-- start sidebar -->
			<?php include 'inc/sitebar.php';?>
		<!-- end sidebar -->
	</div>
	<!-- end contentsection -->
<?php include 'inc/footer.php';?>