<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rare-earth Nano-optoelectronic Lab</title>
<?php include("./include/media/css.php");?>
<?php include("./include/media/js.php");?>
<link rel="stylesheet" type="text/css" href="./media/css/introduction.css" />
</head>
<body>
<?php require("./db/conn.php");?>
<?php require("./util/util.php");?>
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
            <h4>Introduction</h4>   
		    <div class="intro_area">  
		        <?php include("./background/attachments/html/introduction.html");?>
			</div>
		</div>
	</div> 
</div>
<?php include("./include/footer.php");?>
</div>                                    
<script type="text/javascript" src="./media/js/lab.js"></script>
<script type="text/javascript">
$(function (){
    $("#i_nav_li a").addClass("current");    
});
</script>
</body>
</html>
