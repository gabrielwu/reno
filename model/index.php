<?php
include("./db/conn.php");
function intro() {
    
}
function slide_intro() {
    $sql5="select id,name,slide_pic from lab";
	$result5 = mysql_query("$sql5");
	$k=0;
	while($row5 = mysql_fetch_array($result5)){
	    $file_path = $path[$k]="./background".substr($row5['slide_pic'],2);
		if (is_file($file_path)) {
		    $id[$k]=$row5['id'];
			$description[$k]=$row5['name'];
			$slide_pic[$k]="./background".substr($row5['slide_pic'],2);
			$k++;
		}
	}
	$slide_data = array("id" => $id, "description" => $description, "slide_pic" => $slide_pic, "count" => $k);
	return $slide_data;
/*
    $sql5="select id,path,description,link from intro_pic";
	$result5 = mysql_query("$sql5");
	$k=0;
	while($row5 = mysql_fetch_array($result5)){
	    $file_path = $path[$k]="./background".substr($row5['path'],2);
		if (is_file($file_path)) {
		    $id[$k]=$row5['id'];
			$description[$k]=$row5['description'];
			$path[$k]="./background".substr($row5['path'],2);
			$link[$k]=$row5['link'];
			$k++;
		}
	}
	$slide_data = array("id" => $id, "description" => $description, "path" => $path, "link" => $link, "count" => $k);
	return $slide_data;
*/
}
function slide() {
    $sql5="select a_id,a_pic_cover_path,a_name from news where a_pic_cover_path is not null and a_isslide=1";
	$result5 = mysql_query("$sql5");
	$k=0;
	$id = array();
	$name = array();
	$path = array();
	while($row5 = mysql_fetch_array($result5)){
	    $file_path = $path[$k]="./background".substr($row5['a_pic_cover_path'],2);
		if (is_file($file_path)) {
		    $id[$k]=$row5['a_id'];
			$name[$k]=$row5['a_name'];
			$path[$k]="./background".substr($row5['a_pic_cover_path'],2);
			$k++;
		}
	}
	$slide_data = array("id" => $id, "name" => $name, "path" => $path, "count" => $k);
	return $slide_data;
}
function news() {
    $result = mysql_query("SELECT * FROM `news` ORDER BY a_date desc, a_type limit 0, 7");
	return $result;
}
function paper($per) {
    $sql="select * from paper order by p_date desc limit 0, $per";
	$result = mysql_query("$sql");
	return $result;
}
function paper_page($per) {
	$sql0="select count(p_id) as count from paper";
	$result0 = mysql_query("$sql0");
	$row0 = mysql_fetch_array($result0);
	$paperCount=$row0['count'];
	$num = $paperCount;
	$pageCount = ceil($paperCount / $per);
	$result = array("paperCount" => $paperCount, "num" => $num, "pageCount" => $pageCount);
	return $result;
}
function paper_author($id) {
	$sql="select m_name from paper,paper_member where paper.p_id=paper_member.p_no and p_id='$id'";
	$result=mysql_query("$sql");
	return $result;
}
?>