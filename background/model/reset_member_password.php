<?php    $id = $_GET['id'];	include("connect.php");	$pwd = sha1('123456');	$sql="update member set m_password='$pwd' where m_id=".$id;	mysql_query($sql);    $flag = mysql_affected_rows();	if ($flag == 1) {	    echo "密码已重置：123456！";	} else {	    echo "密码重置失败！";	}?>