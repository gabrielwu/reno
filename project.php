<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<?php include("./include/media/css.php");?>
<?php include("./include/media/js.php");?>
<link rel="stylesheet" type="text/css" href="./media/css/project.css" />
</head>
<body>
<?php 
    require("./db/conn.php");
	require("./config/project.php");
    require("./util/util.php");
    require("./model/project.php");
?>
<div id="wrapper">
<?php include("./include/header.php");?>
<div id="content">
	<?php include("./include/login.php");?>
    <?php include("./include/nav.php");?>
    <div id="sidebar">
	    <?php require("./include/sidebar_lab.php");?>
	</div>
	<div id="main">
		<div id="area">
		<h4>Project</h4>
		<?php 
		    $page = 1;
		    if (isset($_GET["page"])) {
			    $page = $_GET["page"];
			}
			$project_data = project($page, $per);
			while ($row = mysql_fetch_array($project_data)) {
		?>
    		<table class="item_tb">
			    <tr class="odd">
				    <td class="entry">Prject Name</td>
				    <td class="value" colspan="3"><?php echo $row['pr_name']?></td>
				</tr>
			    <tr class="even">
				    <td class="entry">Prject Type</td>
				    <td class="value" colspan="3"><?php echo $row['pr_type']?></td>
				</tr>
			    <tr class="odd">
				    <td class="entry">Leader</td>
				    <td class="value"><?php echo $row['pr_leader']?></td>
				    <td class="entry">Cost</td>
				    <td class="value"><?php echo $row['pr_cost']?></td>
				</tr>
			    <tr class="even">
				    <td class="entry">Start Time</td>
				    <td class="value"><?php echo $row['pr_date1']?></td>
				    <td class="entry">End Time</td>
				    <td class="value"><?php echo $row['pr_date2']?></td>
				</tr>
			</table>
		<?php }?>
		<?php 
            $pageTotal = project_page($per);
		?>
			<div id="page">
		    <?php
			    echo $page_html = page($page, $pageTotal, $page_nums, "project.php?page=");
			?>
		    </div>
		</div>
	</div>
</div>
<?php include("./include/footer.php");?>
</div>                                             
<script type="text/javascript" src="./media/js/lab.js"></script>
<script type="text/javascript" src="./media/js/project.js"></script>
<script type="text/javascript">
$(function (){
    $("#p_nav_li a").addClass("current");
});
</script>
</body>
</html>