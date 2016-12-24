<?php
header("Content-Type:text/html;charset=utf-8");
include('connect.php');
$account=$_POST['account'];
$password=$_POST['password'];
$sql = "select * from admin where ad_account like binary('$account')";
$resutl = mysql_query($sql);
$info=mysql_fetch_array($resutl);
mysql_close($link);
if ($info && $info['ad_password'] == sha1($password)) {
	session_start();
	$_SESSION['mark']="login";
	$_SESSION['ad_account'] = $account;
	$_SESSION['ad_id'] = $info['ad_id'];
	$_SESSION['invite_code'] = $info['invite_code'];
	echo "view/manage.php";
} else {
	echo "fail";
}
?>
