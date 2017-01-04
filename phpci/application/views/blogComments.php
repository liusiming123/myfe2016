<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN"><head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="Content-Language" content="zh-CN">
  <title>Johnny的博客 - SYSIT个人博客</title>

	<base href="<?php echo site_url(); ?>">

      <link rel="stylesheet" href="css/space2011.css" type="text/css" media="screen">
  <link rel="stylesheet" type="text/css" href="css/jquery.css" media="screen">
  <script type="text/javascript" src="javascript/jquery-1.js"></script>
  <script type="text/javascript" src="javascript/jquery.js"></script>
  <script type="text/javascript" src="javascript/jquery_002.js"></script>
  <script type="text/javascript" src="javascript/oschina.js"></script>
  <style type="text/css">
    body,table,input,textarea,select {font-family:Verdana,sans-serif,宋体;}	
  </style>
</head>
<body>
<!--[if IE 8]>
<style>ul.tabnav {padding: 3px 10px 3px 10px;}</style>
<![endif]-->
<!--[if IE 9]>
<style>ul.tabnav {padding: 3px 10px 4px 10px;}</style>
<![endif]-->
<div id="OSC_Screen"><!-- #BeginLibraryItem "/Library/OSC_Banner.lbi" -->
<?php include "header.php"?>
	<div id="OSC_Content">
<div id="AdminScreen">
    <div id="AdminPath">
		<a href="user/indexlogined">返回我的首页</a>&nbsp;»
    	<span id="AdminTitle">管理首页</span>
    </div>
<?php include "menu.php"?>
    <div id="AdminContent">
<div class="MainForm BlogCommentManage">
  <h3>共有 3 篇博客评论，每页显示 20 个，共 1 页</h3>
  <ul>
	  <?php
		foreach($comms as $comm){
			echo " <li class=".$comm->comm_id.">";
			echo " <span class='portrait'><a href='#' target='_blank'><img src='images/".$comm->user_id.".jpg'></a></span>";
			echo " <span class='comment'>";
			echo " <div class='user'><b>".$comm->username."</b> 评论了 <a href='viewPost_comment.htm' target='_blank'>".$comm->title."</a></div>";
			echo " <div class='content'><p>".$comm->content."</p></div>";
			echo " <div class='opts'>";
			echo "	<span style='float:right;'>";
			echo "	<a href='javascript:' class='del'>删除</a> |";
			echo "	<a href='javascript:'>删除此人所有评论</a>";
			echo "	</span>";
			echo $comm->create_time;
			echo "	</div>";
			echo " </span>";
			echo " <div class='clear'></div>";
			echo " </li>";
		}
	  ?>
	  </ul>
</div>

	</div>
	<div class="clear"></div>
</div>

</div>
	<div class="clear"></div>
	<div id="OSC_Footer">© 赛斯特(WWW.SYSIT.ORG)</div>
</div>
<script src="javascript/jquery-1.12.4.js"></script>
<script>
	$(function () {
		$('.del').on('click',function(){
			var $li = $(this).parents('li');
			console.log($li);
			var $commid = $li.attr('class');
			console.log($commid);
			$.get("blog/delcomm",{
				"commid" :$commid
			},function(result){
				if(result=="suc"){
					$li.remove();
				}else{
					alert("删除失败");
				}
			});
		});
	})
</script>
</body></html>