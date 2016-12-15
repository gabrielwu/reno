<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<?php include("./include/media/css.php");?>
<link rel="stylesheet" type="text/css" href="./media/css/research.css" />
</head>
<body>
<?php 
    require("./db/conn.php");
	require("./config/device.php");
    require("./util/util.php");
    require("./model/device.php");
?>
<div id="wrapper">
<?php include("./include/header.php");?>
<div id="content">
	<?php include("./include/login.php");?>
    <?php include("./include/nav.php");?>
    <div id="sidebar">
	    <?php include("./include/sidebar_lab.php");?>
	</div>
	<div id="main">
		<div id="area">
		<h3>Device</h3>
	    <?php 
		    $page = 1;
		    if (isset($_GET["page"])) {
			    $page = $_GET["page"];
			}
			$data = device_data($page, $per);
			while ($row = mysql_fetch_array($data)) {
		?>
		    <div class="item">
			    <h4><em></em><?php echo $row["d_name"];?></h4>
			    <div><?php echo $row["d_content"];?></div>
			</div>
		<?php }?>
		<?php 
            $pageTotal = page_total($per);
		?>
			<div id="page">
		    <?php
			    echo $page_html = page($page, $pageTotal, $page_nums, "device.php?page=");
			?>
		    </div>
		</div>
	</div>
</div>
<?php include("./include/footer.php");?>
</div>
<?php include("./include/media/js.php");?>
<script type="text/javascript" src="./media/js/lab.js"></script>
<script type="text/javascript">
$(function (){
    $("#d_nav_li a").addClass("current");
});
</script>
</body>
</html>