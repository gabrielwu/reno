<?php 
session_start(); 
if ($_SESSION['mark']!="login") {
    echo "<script>alert('请先登录！');window.location.href='../login.html';</script>";
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改实验室简介</title>
<?php include('include/media_css.php');?>
<?php include('include/media_js.php');?>
</head>
<body>
<?php 
$type = $_GET['type'];
if ($type == 't') {
    $title = '招贤纳士（教师）';
} else if ($type == 's') {
    $title = '招贤纳士（学生）';
}
?>
<div class="wrapper">
	<?php include('./include/header.php'); ?>
	<div class="leftbox">
		<?php include('./include/leftbar.php');?>
	</div>
	<div class="rightbox">
		<div id="tab" class="box1" style="height:740px;text-align:left">
		    <h3>修改<?php echo $title;?></h3>
			<form action="../model/modify_recruitment.php" method="post" enctype="multipart/form-data">
			    <input type="hidden" name="type" id="type" value="<?php echo $type;?>"/>
			    <table width="650px" align="center" >
				    <tr>
					    <td>
					        <textarea id="editor1" name="intro" style="width:650px;height:450px;">
							<?php 
							    if ($type == 't') {
							        include("../attachments/html/recruitment_t.html");
								} else if ($type == 's') {
							        include("../attachments/html/recruitment_s.html");
								}
							?>
							</textarea>
							<script>
								var editor;
								KindEditor.ready(function(K) {
									editor = K.create('#editor1');
								});
							</script>
					    </td>
				    </tr>
					<tr>
						<td>
							<input type="submit" onclick="return check();" value="提交编辑"/>
							<input type="button" value="附件删除" onclick="showContent()">
							<div id="attachment_manage" title="附件删除"></div>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
	<?php include('./include/footer.php');?>
</div>
<script type="text/javascript">
function check(){
    editor.sync();
	if(document.getElementById('editor1').value==""){
		alert("具体内容空！");
		return false;
	}
	return true;
}
</script>
</body>
</html>