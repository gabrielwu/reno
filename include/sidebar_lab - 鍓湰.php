<div style="width:94%; margin:0 auto;">
<!-- Put the following javascript before the closing </head> tag. -->
<script>
  (function() {
    var cx = '006606256622441310586:1cpkib8oy7a';
    var gcse = document.createElement('script'); gcse.type = 'text/javascript'; gcse.async = true;
    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
        '//www.google.com.hk/cse/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(gcse, s);
  })();
</script>
<!-- Place this tag where you want the search box to render -->
<gcse:searchbox-only></gcse:searchbox-only>
</div>
<div id="sidebar_nav_l1" class="sidebar_nav_static">
	<div>
		<ul>
		    <li id="i_nav_li"><a href="introduction.php">Introduction</a></li>
			<?php
			    $sql = "select id, name from lab";
				$result = mysql_query("$sql");
				while ($row = mysql_fetch_array($result)) {
			?>
			<li id="il_nav_li_<?php echo $row['id'];?>"><a class="sec_li_a" href="intro_lab.php?id=<?php echo $row['id'];?>"><?php echo $row['name'];?></a></li>
			<?php } ?>
			<li id="d_nav_li"><a href="device.php">Device</a></li>
			<li id="p_nav_li"><a href="project.php">Project</a></li>
		</ul>
	</div>
</div>
<div id="back_to_top">
    <a href="#header" onclick="" >TOP</a>
</div>
