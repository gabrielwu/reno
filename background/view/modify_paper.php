<?php session_start(); if ($_SESSION['mark']!="login") {    echo "<script>alert('请先登录！');window.location.href='../login.html';</script>";}require('connect.php');$sql="select * from paper where p_id=".$_GET['id'];	$result=mysql_query($sql);$row=mysql_fetch_array($result);?><html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>修改论文</title><?php include('include/media_css.php');?><?php include('include/media_js.php');?><script charset="utf-8" src="../kindeditor/kindeditor.js"></script><script charset="utf-8" src="../kindeditor/lang/zh_CN.js"></script></head><body><div class="wrapper">	<?php include('./include/header.php'); ?>	<div class="leftbox">	<?php include('./include/leftbar.php');?>	</div>		<div class="rightbox">		<div id="tab" class="box1">		    <h3>修改论文</h3>			<form action="../model/modify_paper.php" method="post" target='iframe' enctype="multipart/form-data">			<input name='id' value='<?php echo $row['p_id']?>' id='id' type='hidden'/>			<input id="old_pic" name="old_pic" type="hidden" value="<?php echo $row['p_coverpath'];?>" size="40"/>			<table width="650px" align="center" border="0">				<tr>					<td rowspan="7" width="200px" align="center"><img width="150px" src="<?php echo $row['p_coverpath'];?>" /></td>					<td  align="center">论文名：</td>					<td ><input id="pname" name="pname" type="text" value="<?php echo $row['p_name'];?>" size="40"/><font color="red">*</font></td>				</tr>				<tr>					<td  align="center">论文作者：</td>					<td ><input id="pauthors" name="pauthors" type="text" value="<?php echo $row['p_members'];?>" size="40"/><font color="red">*</font></td>				</tr>				<tr>					<td  align="center">发表期刊：</td>					<td ><input id="journal" name="journal" type="text" value="<?php echo $row['p_journal'];?>" size="40"/><font color="red">*</font></td>				</tr>				<tr>					<td  align="center">期刊号、页数：</td>					<td ><input id="journal_no" name="journal_no" type="text" value="<?php echo $row['p_journal_no'];?>" size="40"/></td>				</tr>				<tr>					<td " align="center">发表时间：</td>					<td ><input name="date" type="date" value="<?php echo $row['p_date'];?>" size="40"/><font color="red">*</font></td>				</tr>				<tr>					<td  align="center">期刊连接：</td>					<td ><input name="plink" type="text" value="<?php echo $row['p_sci_link'];?>" size="40"/></td>				</tr>				<tr>					<td  align="center" >下载链接：</td>					<td ><input name="dlink" type="text" value="<?php echo $row['p_link'];?>" size="40"/></td>				</tr>				<tr>					<td colspan="3">上传（替换）封面：<input name="img" type="file"/><input type='checkbox' <?php if($row['p_iscover']=='1') echo 'checked="checked"';?> name='iscover'>是否为封面主题</td>				</tr>				<tr>					<td colspan="3">论文摘要：</td>				</tr>				<tr>					<td colspan="3">					<textarea id="editor1" name="abstract" style="width:650px;height:400px;"><?php echo $row['p_abstract'];?></textarea>					<script>						var editor;						KindEditor.ready(function(K) {							editor = K.create('#editor1');						});					</script>					</td>				</tr>				<tr>					<td colspan="3">highlighted：</td>				</tr>				<tr>					<td colspan="3">					<textarea id="editor2" name="highlighted" style="width:650px;height:200px;"><?php echo $row['p_highlighted'];?></textarea>					<script>						var editor2;						KindEditor.ready(function(K) {							editor2 = K.create('#editor2');						});					</script>					</td>				</tr>				<tr>					<td colspan="3">citation：</td>				</tr>				<tr>					<td colspan="3">					<textarea id="editor3" name="citation" style="width:650px;height:200px;"><?php echo $row['p_citation'];?></textarea>					<script>						var editor3;						KindEditor.ready(function(K) {							editor3 = K.create('#editor3');						});					</script>					</td>				</tr>				<tr>				    <td>					    <!--<input type="button" value="附件删除" onclick="showContent()">						<div id="attachment_manage" title="附件删除"></div>-->					</td>					<td><input type="submit" onclick="return check();" value="保存修改"/></td>				</tr>			</table>			</form>		</div>	</div>	<?php include('./include/footer.php');?></div><iframe width='0' height='0' name='iframe'></iframe><script type="text/javascript" charset="utf-8" src="../js/attachment.js"></script><script type="text/javascript">function check(){    editor.sync();    editor2.sync();    editor3.sync();	if(document.getElementById('id').value=="")	{		alert("论文号空！");		return false;	}	if(document.getElementById('pname').value=="")	{		alert("论文名空！");		return false;	}	if(document.getElementById('pauthors').value=="")	{		alert("论文作者空！");		return false;	}	if(document.getElementById('journal').value=="")	{		alert("期刊空！");		return false;	}	if(document.getElementById('date').value=="")	{		alert("发表时间空！");		return false;	}	return true;}</script></body></html>