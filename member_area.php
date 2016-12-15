<?php 
session_start(); 
if (!$_SESSION['login']) {
    echo "<script>alert('Sorry, you do not have permission to this page!');window.location.href='index.php'</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<?php include("./include/media/css.php");?>
</head>
<body>
<?php 
    require("./db/conn.php");
	require("./config/member_area.php");
    require("./util/util.php");
    require("./model/member_area.php");
?>
<div id="wrapper">
<?php include("./include/header.php");?>
<div id="content">
	<?php include("./include/login.php");?>
    <?php include("./include/nav.php");?>
    <div id="sidebar">
	    <?php require("./include/sidebar_member_area.php");?>
	</div>
	<div id="main">
		<div id="area">
			<h3>Group Notice</h3>
			<div id="news_items">
				<table id="news_table">
				<?php 
					$page = 1;
					if (isset($_GET["page"])) {
						$page = $_GET["page"];
					}
					$data = group_notice($page, $perGroupNotice);
					while ($row = mysql_fetch_array($data)) {
				?>
					<tr>
						<td width="80%"><a href="group_notice_detail.php?id=<?php echo $row['id'];?>"><?php echo GBsubstr($row['name'], 0, 65);?></a></td>
						<td><?php echo substr($row['date'], 0, 10);?></td>
					</tr>
				<?php }?>
				</table>
			</div>
			<div id="page">
			<?php
				$pageTotal = group_notice_page_total($perGroupNotice);
				echo $page_html = ajaxPage(1, $pageTotal, $page_nums, "pageGroupNotice");
			?>
			</div>
		</div>
    </div>
</div>
<?php include("./include/footer.php");?>
</div>
<?php include("./include/media/js.php");?>
<script type="text/javascript" src="./media/js/member_area.js"></script>
<script type="text/javascript">
    $("#g_nav_li a").addClass("current");
</script>
</body>
</html>