<?php 
    session_start();
	$invite_code = $_SESSION['invite_code'];
	$ad_account = $_SESSION['ad_account'];
	header("Content-Type:text/html;charset=utf-8");
	$login_mark=$_GET['login_mark'];
?>
<style type='text/css'>
table {margin: 20px auto;}
td { padding: 0; line-height: 1.5;}
</style>
<?php
	if($login_mark=='account'){//修改用户名
?>
	<h3>修改用户信息</h3>
	<table align="center" height="">
		<tr><td width="600px">用户名:(*10位以内数字和字母组合)</td></tr>
		<tr><td><input value='<?php echo $ad_account;?>' type="text" id="ad_account"></input></td></tr>
		<tr><td width="600px">邀请码:(*10位以内数字和字母组合)</td></tr>
		<tr><td><input value='<?php echo $invite_code;?>' type="text" id="invite_code"></input></td></tr>
		<tr><td><input type="button" class="modify_account"  value="点击修改用户名"></input></td></tr>
		<tr><td id="state"  width="600px"></td></tr>
	</table>
<?php	
	} else {//修改密码
?>	
	<h3>修改密码</h3>
	<table align="center" height="">
	    <tr valign='bottom'>
		    <td width="600px">新密码:(*10位以内数字和字母组合)</td>
		</tr>
		<tr>
		    <td><input type="password" id="password1"></input></td>
		</tr>
		<tr valign='bottom'>
		    <td valign='bottom' width="600px">确认密码:</td>
		</tr>
		<tr><td><input type="password" id="password2"></input></td></tr>
		<tr><td><input type="button"class="modify_password"  onclick="check" value="点击修改密码"></input></td></tr>
		<tr><td id="state"  width="600px"></td></tr>
	</table>	
<?php	
	}
?>
<script src="../js/jquery-1.7.1.min.js"></script>
<script src="../js/jquery-ui-1.8.18.custom.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(".modify_account").click(function(){
		var info="";
		var   re=/^[A-Za-z0-9]*$/;
		var ad_account = $('#ad_account').val();
		var invite_code = $('#invite_code').val();
		if(ad_account=="") {
			info="用户名为空！";
		}
		if(re.test(ad_account)==false){
			info=info+"用户名只能输入字母和数字！";
		}
		if(ad_account.length>10) {
			 info=info+" 用户名位数不能大于10";
		}
		if(invite_code=="") {
			info="邀请码为空！";
		}
		if(re.test(invite_code)==false){
			info=info+"邀请码只能输入字母和数字！";
		}
		if(invite_code.length>10) {
			 info=info+" 邀请码位数不能大于10";
		}
		if(info=="") {
			result = $.ajax({url:"../controller/modify_login_controller.php",async:false,data:"&modify_login_mark="+"account"+"&ad_account="+ad_account+"&invite_code="+invite_code}); 
			info=result.responseText;
		}
		$("#state").html("State："+info);
		window.loaction.reload();
	});
		
	$(".modify_password").click(function(){
		var info="";
		var   re=/^[A-Za-z0-9]*$/;
		if(document.getElementById('password1').value==""){
			info="密码为空！";
		}
		if(re.test(document.getElementById('password1').value)==false){
			info=info+"密码只能输入字母和数字！";
		}
		if(document.getElementById('password1').value.length>10)
		{
			 info=info+"密码位数不能大于10";
		}
		if(document.getElementById('password1').value!=document.getElementById('password2').value)
		{
			info=info+" 两次密码输入不一致！";
		}
		
		
		 //alert(info);
		 if(info=="")
		 {
			//若格式没有问题，提交到控制器,ajax修改数据库
			result = $.ajax({url:"../controller/modify_login_controller.php",async:false,data:"&modify_login_mark="+"password"+"&password="+document.getElementById('password1').value}); 
			info=result.responseText;
		 }
		 
		 
		 $("#state").html("State："+info);
		window.loaction.reload();
		});
	});
</script>



