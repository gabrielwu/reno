<?php 
session_start(); 
if ($_SESSION['mark']!="login") {
    echo "<script>alert('请先登录！');window.location.href='../login.html';</script>";
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加新闻</title>
<?php include('include/media_css.php');?>
<?php include('include/media_js.php');?>
<script charset="utf-8" src="../kindeditor/kindeditor.js"></script>
<script charset="utf-8" src="../kindeditor/lang/zh_CN.js"></script>
<script charset="utf-8" type="text/javascript">
$(function() {
	$(".date").datepicker({
		changeMonth: true,
		changeYear: true
	});
	$(".date").datepicker( "option", "dateFormat", 'yy-mm-dd' );
});
$(function(){
    $('#attachment_manage').dialog({
		autoOpen: false,
		width: 800,
		buttons: {
    		"Ok": function() { 
        			$(this).dialog("close"); 
				}, 
			"Cancel": function() { 
    	    		$(this).dialog("close"); 
				} 
		},
		modal: true
	});
})
function showContent() {
    $('#attachment_manage').dialog('open');
    editor.sync();
	var i = 0;
	var html = "<div id='attach_items'>";
	$('iframe').contents().find("img").each(function(i) {
	    var src = $(this).attr("src");
		var index = src.lastIndexOf("/") + 1;
	    var fileName = src.substr(index);
		var id = "attach" + i;
	    html = html + "<div class='attach_item' id='"+id+"' style='float:left;margin:10px'>";
		html = html + "<a href='" + src + "' target='_blank'>" + "<img title='"+fileName+"' height='140px' src='" + src + "'>" + "</img></a>";
		html = html + "<br/><a href='javascript:deleteAttachment(\"" + src + "\",\""+id+"\")'>"+'删除'+"</a> | <a href='javascript:setSlide(\"" + src + "\",\""+id+"\")'>设置为首页幻灯片</a>";
		html = html + "</div>";
		i++;
	});
	var html = html +  "<div stlye='clear:both'></div>";
	var html = html +  "</div>";
	var html = html +  "</table>";
	$('#attachment_manage').html(html);
}
function attachment() {
    var url;
}
function deleteAttachment(oriUrl, id) {
    var index = oriUrl.indexOf('/background');
	index += '/background'.length;
	url = ".." + oriUrl.substr(index);
    if (confirm("确定删除？")) {
	    var data1 = new attachment();
		data1.url = url;
	    $.ajax({
		    type: 'POST',
			url: "../model/delete_attachment.php",
			data: data1,
			success: function(res) {
			    if (res == "1") {
				    alert("succeed!");
					$("#"+id).remove();
					$('iframe').contents().find("[src='"+oriUrl+"']").remove();
				} else {
				    alert("failed!");
				}
			}
		});
	};
}
function setSlide(oriUrl, id) {
    var index = oriUrl.indexOf('/background');
	index += '/background'.length;
	url = ".." + oriUrl.substr(index);
	$("#a_pic_cover_path_img").attr('src', url);
	$("#a_pic_cover_path").val(url);
	$("#a_isslide").attr("checked", 'checked');
}

function check(){
    editor.sync();
	if(document.getElementById('a_name').value==""){
		alert("标题空！");
		return false;
	}
	if(document.getElementById('a_type').value==""){
		alert("类型空！");
		return false;
	}
	if(document.getElementById('a_date').value==""){
		alert("时间空！");
		return false;
	}
	return true;
}
function add(){
    var data1 = new data();
	data1.a_id = $("#a_id").val();
	data1.a_name = $("#a_name").val();
	data1.a_date = $("#a_date").val();
	data1.a_type = $("#a_type").val();
	data1.a_content = $("#editor1").val();
	data1.a_pic_cover_path = $("#a_pic_cover_path").val();
	if ($("#a_isslide").attr("checked")=='checked') {
	    data1.a_isslide = '1';
	} else {
	    data1.a_isslide = '0';
	}
	if(check()){
		$.ajax({
		    type: 'POST',
			url: "../model/add_academic.php",
			data: data1,
			success: function(res) {
				if (res == "1") {
					alert("succeed!");
					//window.location.reload();
				} else {
					alert("failed!");
				}
			}
		});
	}
}
function data() {
	var a_id;
    var a_name;
	var a_type;
	var a_date;
	var a_content;
	var a_isslide;
	var a_pic_cover_path;
}
</script>
</head>
<body>
<div class="wrapper">
	<?php include('./include/header.php'); ?>
	<div class="leftbox">
	<?php include('./include/leftbar.php');?>
	</div>	
	<div class="rightbox">
		<div id="tab" class="box1">
		    <h3>添加新闻</h3>
			<input id="a_id" name="a_id" type="hidden" value="<?php echo $_GET['id'];?>"/>
			<table width="650px" align="center" >
				<tr>
					<td width="100px" align="center">新闻标题：</td>
					<td width="520px"><input id="a_name" name="a_name" type="text" size="50" value=""/><font color="red">*</font></td>
				</tr>
				<tr>
					<td width="100px" align="center">类型：</td>
					<td width="520px">
						<select id="a_type" name="a_type">
							<option value="c" >会议</option>
							<option value="a" >论文</option>
							<option value="b" >学生</option>
							<option value="d" >其他</option>
						</select>
					
					</td>
				</tr>
				<tr>
					<td  align="center">时间：</td>
					<td ><input  id="a_date" name="a_date" type="text" size="50" class='date' value=""/><font color="red">*</font></td>
				</tr>
				<tr>
					<td colspan="2">内容：</td>
				</tr>
				<tr>
					<td colspan="2">
					<textarea id="editor1" name="a_content" style="width:650px;height:450px;" ></textarea>
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
					    <input type="button" value="幻灯片设置及图片删除" onclick="showContent()">
						<div id="attachment_manage" title="幻灯片设置及图片删除"></div>
					</td>
				    <td></td>
				</tr>
				<tr>
				    <td colspan="2">首页幻灯片图片
					    <input type='checkbox' id='a_isslide' name='a_isslide'></br>
					    <img width='220' src="" id='a_pic_cover_path_img'>
						<input type='hidden' id='a_pic_cover_path' value="">
					</td>
				</tr>
				<tr><td ></td>
					<td><input type="button" onclick='add();' id='submit' value="添加新闻"/></td>			
				</tr>
			</table>
		</div>
	</div>
	<?php include('./include/footer.php');?>
</div>

</body>
</html>