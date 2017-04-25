<?php ob_start(); ?>
<?php include 'config/config.php';?>
<?php include 'lib/Database.php';?>
<?php include 'helpers/format.php';?>
<?php 
	$dbcon=new Database();
	$dfm=new Format();

?>
<!DOCTYPE html>
<html>
<head>
<?php include 'scripts/meta.php'; ?>
<?php include 'scripts/js.php'; ?>
<?php include 'scripts/css.php'; ?>
</head>

<body>
	<div class="headersection templete clear">
		<a href="#">
			<div class="logo">
			<?php 
				$query="SELECT * FROM tbl_site_title WHERE id=1";
                    $slogan=$dbcon->select($query);
                    if ($slogan) {
                        while ($data=$slogan->fetch_assoc()) {?>
				<img src="admin/<?php echo $data['logo'];?>" height="100px" width="200px">
				<h2><?php echo $data['title'];?></h2>
				<p><?php echo $data['slogan'];?></p>
				<?php } }?>
			</div>
		</a>
		<div class="social clear">
			<div class="icon clear">
			 <?php 
                    $query="SELECT * FROM tbl_social";
                    $social=$dbcon->select($query);
                  if ($social) {
                while ($row=$social->fetch_assoc()) { ?>
				<a href="<?php echo $row['fb'];?>" target="_blank"><i class="fa fa-facebook"></i></a>
				<a href="<?php echo $row['tt'];?>" target="_blank"><i class="fa fa-twitter"></i></a>
				<a href="<?php echo $row['link'];?>" target="_blank"><i class="fa fa-linkedin"></i></a>
				<a href="<?php echo $row['gp'];?>" target="_blank"><i class="fa fa-google-plus"></i></a>
				<?php }}?>
			</div>
			<div class="searchbtn clear">
			<form action="search.php" method="get">
			<i class="fa fa-search" aria-hidden="true"></i>
				<input type="text" name="search" placeholder="Search keyword..."/>
				
				<input type="submit" name="submit" value="Search"/>
			</form>
			</div>
		</div>
	</div>
<div class="navsection templete">
	<ul>
	<?php
		$path=$_SERVER['SCRIPT_FILENAME'];
 		$currentpage=basename($path, '.php');
 		?>
	<li>
		
		<a <?php if ($currentpage == 'index'){echo "id='active'";} ?>
		href="index.php">
		<i class="fa fa-home"></i>
		Home
		</a>
	</li>
	 <?php 
        $query="SELECT * FROM tbl_page";
        $page=$dbcon->select($query);
        if ($page) {
		while ($result=$page->fetch_assoc()) { ?>
        <li>
	    	<a 
	    	<?php
	   	if (isset($_GET['pageid']) && $_GET['pageid'] == $result['id'])
	    {
	    			echo "id='active'";
	    		}
	    	?>

	    	href="page.php?pageid=<?php echo $result['id'];?>">
	        <?php echo $result['name'];?>
	        
	    	</a>
    	</li>
		<?php }}?>
		</li>
		<li>
		<a  
			<?php if($currentpage =='contact')
				{
					echo "id='active'";
				}
			?>
		href="contact.php">
		<i class="fa fa-info"></i>
			Contact
		</a>
		</li>
	</ul>
</div>

<!--  end menu-->