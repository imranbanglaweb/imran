<?php 
if (isset($_GET['pageid'])) {
	$pageid=$_GET['pageid'];
    $query="SELECT * FROM tbl_page WHERE id='$pageid'";
    $page=$dbcon->select($query);
    if ($page) {
        while ($result=$page->fetch_assoc()) {?>
        		<title>
        			<?php echo $result['name'];?> |
        			<?php echo TITLE; ?>
        		</title>
        	<?php }}
 }
 else
 {?>
 	<title>
 		<?php echo $dfm->title();?> | <?php echo TITLE; ?>
 	</title>
<?php }?>

<meta name="language" content="English">
<meta name="description" content="It is a website about education">
<meta name="keywords" content="blog,cms blog">
<meta name="author" content="Delowar">
<!-- favicon -->
<link rel="apple-touch-icon" sizes="57x57" href="admin/favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<!-- end favicon -->