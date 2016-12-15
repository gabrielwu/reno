<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rare-earth Nano-optoelectronic Lab</title>
<?php include("./include/media/css.php");?>
<link rel="stylesheet" type="text/css" href="./media/css/member.css" />
<style type="text/css">
#content{min-height:500px;}
#main{min-height:500px;}
#area{min-height:420px;}
.box {margin: 50px 100px;}
#tb_modifyPwd span {color: #ff0000; font-size:13px;};
</style>
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
	    <?php include("./include/sidebar_index.php");?>
	</div>
	<div id="main">
	    <div id="area">
            <h3>Member Register</h3>
			<div class="box">
			<table id="tb_modifyPwd" class="">
			    <tr>
				    <td>Username</td>
				    <td><input type="text" id="username2"></td>
				    <td><span id="msgUsername"></span></td>
				</tr>
			    <tr>
				    <td>Password</td>
				    <td><input type="password" id="password2"></td>
				    <td><span id="msgPassword"></span></td>
				</tr>
			    <tr>
				    <td>Confirm Password</td>
				    <td><input type="password" id="confirmPwd"></td>
				    <td><span id="msgConfirmPwd"></span></td>
				</tr>
			    <tr>
				    <td>Invite Code</td>
				    <td><input type="password" id="inviteCode"></td>
				    <td><span id="msgInviteCode"></span></td>
				</tr>
				<tr>
				    <td colspan="2" align="center">
					    <input type="button" class="btn" id="submit" value="Submit">
					</td>
				</tr>
			</table>
			</div>
        </div>			
    </div>
</div>
<?php include("./include/footer.php");?>
</div>
<?php include("./include/media/js.php");?>
<script type="text/javascript" src="./media/js/index.js"></script>
<script type="text/javascript" src="./media/js/member_register.js"></script>
<script type="text/javascript">

</script>
</body>
</html>
