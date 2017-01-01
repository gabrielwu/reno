<?php
	$link=mysql_connect("localhost","root","") or die("Could not connect:".mysql_error());
	mysql_select_db("reno",$link);
    mysql_query("set names 'utf8'");
/*
	$con = mysql_connect("localhost","root","root");	
	if(!$con){
		die('Could not connect: ' . mysql_error());
	}else{
	}
	mysql_select_db("reno", $con);
    mysql_query("set names 'utf8'");
*/
?>