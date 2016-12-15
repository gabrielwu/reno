<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<?php include("./include/media/css.php");?>
<link rel="stylesheet" type="text/css" href="./media/css/publications.css" />
</head>
<body>
<?php require("./db/conn.php");?>
<?php require("./util/util.php");?>
<?php require("./config/publications.php");?>
<div id="wrapper">
<?php include("./include/header.php");?>
<div id="content">
	<?php include("./include/login.php");?>
    <?php include("./include/nav.php");?>
    <div id="sidebar">
	    <?php include("./include/sidebar_publications.php");?>
	</div>
	<div id="main">
	    <div id="area">
			<?php 
			    if (isset($_GET["year"])) {
    				$year = $_GET["year"];
				} else {
				    $year = -1;
				}
				$nextyear=$currentyear + 1;
				$nextyear_newyearsdate=$nextyear."-01-01"; 
				echo "<h3>Journal Papers</h3>";
			    if ($year == -1) { // 显示全部
					$sqlC = "select count(p_id) as count from paper where p_date <'$nextyear_newyearsdate'";
					$sql1 = "select * from paper where p_date <'$nextyear_newyearsdate' order by p_date desc limit 0, $per";
				} else if ($year == $currentyear - 5) { // 显示5年之前
				    $sqlC = "select count(p_id) as count from paper where p_date <= '$year-12-31'";
				    $sql1 = "select * from paper where p_date <= '$year-12-31'  order by p_date desc limit 0, $per";
				    echo "<h4><em></em>Papers before $year</h4>";
				} else { // 显示指定年份
				    $sqlC = "select count(p_id) as count from paper where p_date like '$year%%'";
				    $sql1 = "select * from paper where p_date like '$year%%'  order by p_date desc limit 0, $per";
				    echo "<h4><em></em>Papers in $year</h4>";
				}
			?>
			<?php
				$result1 = mysql_query("$sql1");
				$resultC = mysql_query($sqlC);
				$rowC = mysql_fetch_array($resultC);
				$paperCount = $rowC["count"];
				$num = $paperCount;
				$index = 0;
				$currentDisplayYear = $nextyear;
				while ($row1 = mysql_fetch_array($result1)) {
                    if ($year == -1) {
					    if (substr($row1['p_date'],0,4) < $currentDisplayYear) {
						    $currentDisplayYear = substr($row1['p_date'],0,4);
						    echo "<h4><em></em>Papers in $currentDisplayYear</h4>";
						}
					}
			?>
			<div class="item">
			    <?php 
				    ++$index;
				    echo $num--. ". ";
   					$paperid=$row1['p_id'];
					echo $row1['p_members'];
				?>
				    <a class="paper_name" href="paper_detail.php?pid=<?php echo $paperid ?>"><?php echo $row1['p_name'];?></a>, 
					<span class="bold"><?php echo $row1['p_journal']; ?></span>
				<?php 
				    if($row1["p_sci_link"]!=null){ 
				?>
                    <a href="<?php echo $row1['p_sci_link']?>" >
                        <?php 
						    if($row1["p_journal_no"]!=null){ 
							    echo $row1["p_journal_no"]; 
						    }
						?>
                    </a>
                <?php 
				    }
				?>
                <?php echo '('.substr($row1['p_date'],0,4).')' ; ?>.
    			<?php if($row1['p_link']!=null){ ?>
    				<a href="<?php echo $row1[p_link]?>">Download</a>
                <?php }?>
			</div>
			<?php
			    }
				$sql = "select count(p_id) as count from paper ";
				if ($year == -1) {
					$sql .="where p_date <'$nextyear_newyearsdate'";
				} else if ($year == $currentyear - 5) {
				    $sql .="where p_date <= '$year-12-31'";
				} else {
				    $sql .="where p_date like '$year%%'";
				}
			    $result = mysql_query($sql);
			    if ($row = mysql_fetch_array($result)) {
    			    if ($row["count"] > $per) {
			?>
		        <div id="more" class="more"><a href="javascript:more(<?php echo $index.",".$year.",".$currentDisplayYear;?>)">more<em></em></a></div>
		    <?php
		            } else {
		    ?>
		    <br/>
            <?php		
				    }
			    }
		    ?>
		</div>
	</div> 
</div>
<?php include("./include/footer.php");?>
</div>
<?php include("./include/media/js.php");?>
<script type="text/javascript" src="./media/js/publications.js"></script>
<script type="text/javascript">
$(function(){
    $("#li_paper<?php echo $year;?> a").addClass("current");	
});
</script>
</body>
</html>