<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN"><head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="Content-Language" content="zh-CN">
  <title>已发送留言 Johnny的博客 - SYSIT个人博客</title>

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
    	<span id="AdminTitle">我的留言箱</span>
    </div>
<?php include "menu.php"?>
    <div id="AdminContent">


<ul class="tabnav"> 
	<li class="tab1"><a href="user/inbox">所有留言<em>(1)</em></a></li>
	<li class="tab4 current"><a href="user/outbox">已发送留言<em>(1)</em></a></li>
</ul>
<div class="MsgList">
<ul>
	<?php
	foreach($messages as $message){
		echo "<li id='msg_186774'>";
		echo "<span class='sender'><a href='#' target='user'><img src='images/".$message->send_user.".jpg' ></a></span>";
		echo "<span class='msg'>";
		echo "<div class='outline'>";
		echo "	<a href='#' target='user'>me</a>&nbsp;&nbsp;";
		echo "发送于 ".$message->creat_time;
		echo "	<a href='user/delMySendMessage?messid=$message->message_id'>删除</a>";
		echo "</div>";
		echo "<div class='content'><div class='c'>".$message->content."</div></div>";
		echo "</span>";
		echo "<div class='clear'></div>";
	  	echo "</li>";
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
</body></html>