<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<?php include("./include/media/css.php");?>
<link rel="stylesheet" type="text/css" href="./media/css/research.css" />
<link rel="stylesheet" type="text/css" href="./media/third_party/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
</head>
<body>
<?php 
    require("./db/conn.php");
	require("./config/research.php");
    require("./util/util.php");
    require("./model/research.php");
?>
<div id="wrapper">
<?php include("./include/header.php");?>
<div id="content">
	<?php include("./include/login.php");?>
    <?php include("./include/nav.php");?>
    <div id="sidebar">
	    <?php include("./include/sidebar_research.php");?>
	</div>
	<div id="main">
		<div id="area">
		<h3>Research</h3>
		<?php 
			$data = research();
			while ($row = mysql_fetch_array($data)) {
			    $index++;
		?>
			<div id="r_<?php echo $row['r_id']?>" class="item">
				<h4><em></em><?php echo $row['r_name']?></h4>
				<div class="r_content"><?php echo $row['r_content']?></div>
			</div>
		 <?php } ?>
		</div>
	</div>
</div>
<?php include("./include/footer.php");?>
</div>
<?php include("./include/media/js.php");?>
<script type="text/javascript" src="./media/js/research.js"></script>
<script type="text/javascript" src="./media/third_party/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="./media/third_party/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
</body>
</html>