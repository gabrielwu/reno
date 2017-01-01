<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rare-earth Nano-optoelectronic Lab</title>
<?php require("./include/media/css.php");?>
<?php 
require("./db/conn.php");
require("./model/index.php");
require("./util/util.php");
require("./config/index_paper_page.php");
?>
<link rel="stylesheet" type="text/css" href="./media/css/index.css" />
<link rel="stylesheet" type="text/css" href="./media/third_party/slide/slide.css" />
</head>
<body>
<div id="wrapper">
<?php include("./include/header.php");?>
<div id="content">
	<?php include("./include/login.php");?>
	<?php include("./include/nav.php");?>
	<div id="main" class="main_left">
	    <div id="intro_area" class="box area">
		    <div id="slide_box_intro" class="slide_box">
			    <ul class="list">    
				<?php 
    				$slide_data = slide_intro();
					$slide_count = 0;
					for ($i = 0; $i < $slide_data["count"]; $i++,$slide_count++) {
				?>
				    <li>
					    <a href='intro_lab.php?id=<?php echo $slide_data["id"]["$i"];?>' target="_blank">
						    <img src='<?php echo $slide_data["slide_pic"]["$i"];?>' alt='<?php echo GBsubstr($slide_data["description"]["$i"], 0, 53);?>' width="270" height="200"/>
						</a>
					</li>
				<?php } ?>
				</ul>
				<ul class="count">
				<?php
				    for ($i = 1; $i <= $slide_count; $i++) {
				?>
				    <li class=""><?php echo $i;?></li>
				<?php } ?>
			    </ul>
				<div><?php echo GBsubstr($slide_data["description"][0], 0, 53);?></div>
			</div>
			<div id="intro_content" class="">
				<span class="box_title">Intro</span>
				<a class="more_a" href="introduction.php">+more</a>
				<div id='intro_marquee'>
                    <div id='intro_marquee_1'><?php include("./background/attachments/html/introduction.html");?></br></br></div>                     
                    <div id='intro_marquee_2'></div>     
                </div>                               
            </div>
		</div>
	    <div id="news_area" class="box area">
		    <div id="slide_box_news" class="slide_box">
			    <ul class="list">    
				<?php 
    				$slide_data = slide();
					$slide_count = 0;
					for ($i = 0; $i < $slide_data["count"]; $i++,$slide_count++) {
				?>
				    <li>
					    <a href='news_detail.php?nid=<?php echo $slide_data["id"]["$i"];?>' target="_blank">
						    <img src='<?php echo $slide_data["path"]["$i"];?>' alt='<?php echo GBsubstr($slide_data["name"]["$i"], 0, 53);?>' width="270" height="200"/>
						</a>
					</li>
				<?php } ?>
				</ul>
				<ul class="count">
				<?php
				    for ($i = 1; $i <= $slide_count; $i++) {
				?>
				    <li class=""><?php echo $i;?></li>
				<?php } ?>
			    </ul>
				<div>
				<?php 
				if (isset($slide_data) && isset($slide_data['name'])  && isset($slide_data['name'][0]) ) {
					echo GBsubstr($slide_data["name"][0], 0, 53);
				}
				?>
				</div>
			</div>
			<div id="news_content" class="">
				<span class="box_title">News</span>
				<a class="more_a" href="news.php">+more</a>
				<div id="news_items">
					<table id="news_table">
					<?php 
						$news_data = news();
						while($news_data_row = mysql_fetch_array($news_data)){
					?>
						<tr>
							<td width="80%">
								<a href="news_detail.php?nid=<?php echo $news_data_row['a_id']?>" title="<?php echo $news_data_row['a_name']?>">
									<?php 
										echo GBsubstr($news_data_row['a_name'], 0, 50);
									?>
								</a>
							</td>
							<td><?php echo $news_data_row['a_date']?></td>
						</tr>
					<?php } ?>
					</table>
				</div>
			</div>
		</div>
		<div id="paper_area" class="box">
		    <span class="box_title">Paper</span>
			<a class="more_a" href="publications.php">+more</a>
			<div id="paper_items">
			    <table id="paper_table">
				<?php 
				    $paper_data = paper($per);
					$paper_page_data = paper_page($per);
					$num = $paper_page_data["num"];
					$pageCount = $paper_page_data["pageCount"];
					$num = $paper_page_data["num"];
					while($paper_data_row = mysql_fetch_array($paper_data)){
				?>
				    <tr>
					    <td width="22%" align="center">
							<a href="paper_detail.php?pid=<?php echo $paper_data_row['p_id']?> "target=_blank>
							    <img alt="Latest Papers" src="<?php echo "./background".substr($paper_data_row['p_coverpath'],2) ?>" height=90>
							</a>
						</td>
						<td width="">
							<table>
							    <tr>
								    <td colspan="2">
								        <a href="paper_detail.php?pid=<?php echo $paper_data_row['p_id']?>" title="<?php echo $paper_data_row['p_name'];?>" target="_blank"> 
									    <?php				
										    echo $num--.".".$paper_data_row['p_name'];
									    ?>
								        </a>
								    </td>
								</tr>
								<tr>
								    <td width="16%">Author(s):</td>
									<td><?php echo $paper_data_row['p_members']?></td>
								</tr>
								<tr>
								    <td>Journal:</td><td><?php echo $paper_data_row['p_journal']?>, <?php echo $paper_data_row['p_journal_no']?></td>
								</tr>
								<tr>
								    <td>Date:</td><td><?php echo $paper_data_row['p_date']?></td>
								</tr>
							</table>
						</td>
					</tr>
				<?php } ?>
				</table>
				<div id="paper_page">
				    <?php
					    echo "<a class='num_page current_page' >1</a>";
					    if ($pageCount <= $page_nums) {
						    for ($pi = 2; $pi <= $pageCount; $pi++) {
				                echo "<a class='num_page' href='javascript:paper_page($pi)'>$pi</a>";	    
							}
						} else {
						    for ($pi = 2; $pi <= $page_nums; $pi++) {
					            echo "<a class='num_page' href='javascript:paper_page($pi)'>$pi</a>";
							}
							echo "...";
							echo "<a class='num_page' href='javascript:paper_page($pageCount)'>$pageCount</a>";
						}
					?>
				    <a id="pre" class="pre_next pre_next_disable"><em></em>pre</a>
				    <a id="next" class="pre_next" href="javascript:paper_page(2)"><em></em>next</a>
			    </div>
			</div>
		</div>
	</div> 
    <div id="sidebar" class="sidebar_right">
	    <?php include("./include/sidebar_index.php");?>
	</div>
</div>
<?php include("./include/footer_index.php");?>
</div>
<?php include("./include/media/js.php");?>
<script type="text/javascript" src="./media/js/index.js"></script>
<script type="text/javascript" >
$(function(){  
var speed=60;                  
var demo = $("#intro_marquee"); 
var demo1 = $("#intro_marquee_1"); 
var demo2 = $("#intro_marquee_2");
demo2.html(demo1.html());
function Marquee(){ 
    if(demo.scrollTop()>=demo1.height())
        demo.scrollTop(0); 
    else{
        demo.scrollTop(demo.scrollTop()+1);
    }
} 
var MyMar=setInterval(Marquee,speed); 
demo.mouseover(function() {
    clearInterval(MyMar);
} )
demo.mouseout(function() {
    MyMar=setInterval(Marquee,speed);
} )
});

$(function () {  
	var oBox_news = $("#slide_box_news");
	var aUl_news = $("#slide_box_news .list");
	var aImg_news = $("#slide_box_news ul:nth-child(1) li");
	var aNum_news = $("#slide_box_news ul:nth-child(2) li");
	$("#slide_box_news ul:nth-child(1) li:nth-child(1)").addClass("current");
	$("#slide_box_news ul:nth-child(2) li:nth-child(1)").addClass("current");
	var timer_news = play_news = null;
	var i_news = index_news = 0;	
	//切换按钮
	for (i_news = 0; i_news < aNum_news.length; i_news++) {
		aNum_news[i_news].index_news = i_news;
		aNum_news[i_news].onmouseover = function () {
			show_news(this.index_news)
		}
	}
	//鼠标划过关闭定时器
	oBox_news.onmouseover = function () {
		clearInterval(play_news)	
	};
	
	//鼠标离开启动自动播放
	oBox_news.onmouseout = function () {
		autoPlay_news()
	};	
	
	//自动播放函数
	function autoPlay_news () {
		play_news = setInterval(function () {
			index_news++;
			index_news >= aImg_news.length && (index_news = 0);
			show_news(index_news);		
		},3000);	
	};
	autoPlay_news();//应用
	//图片切换, 淡入淡出效果
	function show_news (a) {
		index_news = a;
		var alpha = 0;
		for (i_news = 0; i_news < aNum_news.length; i_news++)aNum_news[i_news].className = "";

		aNum_news[index_news] && (aNum_news[index_news].className = "current");
		clearInterval(timer_news);			
		var nth = index_news + 1;
        var title = $("#slide_box_news .list li:nth-child("+nth+") a img").attr("alt");	
		$("#slide_box_news div").text(title);
		for (i_news = 0; i_news < aImg_news.length; i_news++) {
			aImg_news[i_news].style.opacity = 0;
			aImg_news[i_news].style.filter = "alpha(opacity=0)";	
		}
		timer_news = setInterval(function () {
			if (aImg_news[index_news]) {
				alpha += 2;
				alpha > 100 && (alpha =100);
				aImg_news[index_news].style.opacity = alpha / 100;
				aImg_news[index_news].style.filter = "alpha(opacity = " + alpha + ")";
				alpha == 100 && clearInterval(timer_news);
			}
		},20);
	}
});
$(function () {
	var oBox = $("#slide_box_intro");
	var aUl = $("#slide_box_intro .list");
	var aImg = $("#slide_box_intro ul:nth-child(1) li");
	var aNum = $("#slide_box_intro ul:nth-child(2) li");
	$("#slide_box_intro ul:nth-child(1) li:nth-child(1)").addClass("current");
	$("#slide_box_intro ul:nth-child(2) li:nth-child(1)").addClass("current");
	var timer = play = null;
	var i = index = 0;	
	//切换按钮
	for (i = 0; i < aNum.length; i++) {
		aNum[i].index = i;
		aNum[i].onmouseover = function () {
			show(this.index)
		}
	}
	//鼠标划过关闭定时器
	oBox.onmouseover = function () {
		clearInterval(play)	
	};
	
	//鼠标离开启动自动播放
	oBox.onmouseout = function () {
		autoPlay()
	};	
	
	//自动播放函数
	function autoPlay () {
		play = setInterval(function () {
			index++;
			index >= aImg.length && (index = 0);
			show(index);		
		},3000);	
	}
	autoPlay();//应用
	//图片切换, 淡入淡出效果
	function show (a) {
		index = a;
		var alpha = 0;
		for (i = 0; i < aNum.length; i++)aNum[i].className = "";
		aNum[index].className = "current";
		clearInterval(timer);			
		var nth = index + 1;
        var title = $("#slide_box_intro .list li:nth-child("+nth+") a img").attr("alt");	
		$("#slide_box_intro div").text(title);
		for (i = 0; i < aImg.length; i++) {
			aImg[i].style.opacity = 0;
			aImg[i].style.filter = "alpha(opacity=0)";	
		}
		timer = setInterval(function () {
			alpha += 2;
			alpha > 100 && (alpha =100);
			aImg[index].style.opacity = alpha / 100;
			aImg[index].style.filter = "alpha(opacity = " + alpha + ")";
			alpha == 100 && clearInterval(timer)
		},20);
	}
});
</script>
<!-- <script type="text/javascript" src="https://getfirebug.com/firebug-lite.js"></script> -->
</body>
</html>
