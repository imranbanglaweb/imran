<?php
    ob_start();
?>
<?php 
    include '../lib/session.php';
    Session::checksession();
?>
<?php include '../config/config.php';?>
<?php include '../lib/Database.php';?>
<?php include '../helpers/format.php';?>
<?php 
    $username   = Session::get('name');
    $dbcon=new Database();
    $dfm=new Format();

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title> Admin</title>

<meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
    <link href="css/table/demo_page.css" rel="stylesheet" type="text/css" />
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="admin/favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="admin/favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="admin/favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="admin/favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="admin/favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="admin/favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="admin/favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="admin/favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="admin/favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="admin/favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="admin/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="admin/favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="admin/favicon/favicon-16x16.png">
<link rel="manifest" href="favicon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<!-- end favicon -->
    <!-- BEGIN: load jquery -->
    <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.sortable.min.js" type="text/javascript"></script>
    <script src="js/table/jquery.dataTables.min.js" type="text/javascript"></script>
    <!-- END: load jquery -->
    <script type="text/javascript" src="js/table/table.js"></script>
    <script src="js/setup.js" type="text/javascript"></script>
	 <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
		    setSidebarHeight();
        });
    </script>
    <style type="text/css">
        .addpage a{
            color: green;
            font-weight: bold;
            font-size: 18px
        }
    </style>

</head>
<body>
<?php 
$name   = Session::get('name');
 ?>
    <div class="container_12">
        <div class="grid_12 header-repeat">
            <div id="branding">
                <div class="floatleft logo">
                    <img src="img/livelogo.png" alt="Logo" />
				</div>
				<div class="floatleft middle">
					<h1>Web Tutorial House</h1>
					<p>www.imranweb-bd.com</p>
				</div>
<?php 
    if (isset($_GET['action']) && $_GET['action'] =='logout') {
    Session::destroy();
    }
 ?>
                <div class="floatright">
                    <div class="floatleft">
                        <img src="img/img-profile.jpg" alt="Profile Pic" /></div>
                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
            <li>
            Hello <?php echo Session::get('username'); ?>
            </li>
                            <li><a href="?action=logout">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="clear">
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
        <div class="grid_12">
            <ul class="nav main">
                <li class="ic-dashboard">
                <a href="index.php"><span>Dashboard</span>
                </a> 
                </li>
                <li class="ic-dashboard">
                <a href="theme.php"><span>Theme</span>
                </a> 
                </li>
                <li class="ic-form-style"><a href="profile.php"><span>User Profile</span></a></li>
				<li class="ic-password"><a href="changepassword.php"><span>Change Password</span></a></li>
				<li class="ic-grid-tables"><a href="inbox.php"><span>Inbox
                <?php 
                    $query="SELECT * FROM tbl_contact WHERE status=0
                    order by id desc";
                    $msg=$dbcon->select($query);
                    if ($msg) {
                        $count=mysqli_num_rows($msg);
            echo "(".$count.")";
                    }
                    else {
                        echo "(0)";
                    }

                    ?>
                </span></a></li>
         <!--    <?php 
            if (Session::get('role') =='0') {?>
                    <li>
                        <a href="adduser.php">Add User</a>
                    </li>
               <?php }?> --> 
               <li>
                    <a href="adduser.php">Add User</a>
                </li> 
                <li><a href="userlist.php">User List</a></li>
                <li class="ic-charts"><a href="../index.php" target="blank"><span>Visit Website</span></a></li>
            </ul>
        </div>
        <div class="clear">
        </div>