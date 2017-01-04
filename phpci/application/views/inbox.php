<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN"><head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="Content-Language" content="zh-CN">
  <title>我的留言箱 Johnny的博客 - SYSIT个人博客</title>

	<base href="<?php echo site_url(); ?>">

  <link rel="stylesheet" href="css/space2011.css" type="text/css" media="screen">
  <link rel="stylesheet" type="text/css" href="css/jquery.css" media="screen">
  <style type="text/css">
    body,table,input,textarea,select {font-family:Verdana,sans-serif,宋体;}
	#open{
		display: none;
	}  #drag{
		  width: 100%;
		  height: 100%;
		  position: fixed;
		  background: black;
		  opacity: 0.3;
		  z-index: 100;
	  }  #reply{
		  width: 100%;
		  height: 100%;
		  margin: 0 auto ;
		  position: fixed;
		  z-index: 101;
	  }  .f{
		margin: 200px 0;
	 }
  </style>
</head>
<body>
<div id="open">
	<div id="drag"></div>
	<div id="reply">
	<form action="user/replymessage" method="post" class="f">
		<textarea name="message" id="" cols="30" rows="10"></textarea>
		<input type="hidden"  name="senduser">
		<input type="hidden"  name="userid">
		<input type="submit">
	</form>
	</div>
</div>
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
	<li class="tab1 current"><a href="user/inbox">所有留言<em>(1)</em></a></li>
	<li class="tab4"><a href="user/outbox">已发送留言<em>(0)</em></a></li>
    </ul>
<div class="MsgList">
<ul>
	<?php
	foreach($messages as $message){
		echo "<li id='msg_186720'>";
		echo "<span class='sender'><a href='#'><img src='images/".$message->send_user.".jpg'></a></span>";
		echo "<span class='msg'>";
		echo "<div class='outline'>";
		echo "<a href='#' target='user'>".$message->username."</a>&nbsp;&nbsp;";
		echo "发送于&nbsp;&nbsp;".$message->creat_time;
		echo "&nbsp;&nbsp;<a href='user/delmessage?messid=$message->message_id'>删除</a>";
		echo "</div>";
		echo "<div class='content'>";
		echo "<div class='c'>".$message->content."</div></div>";
		echo "<div class='opts'>";
		echo "<button class='button'>回复留言</button>";
		echo "<input type='hidden' value='$message->send_user' class='senduser'>";
		echo "<input type='hidden' value='$message->user_id' class='userid'>";
//		echo "<a href='#open?$message->send_user&$message->user_id'>回复留言</a>";
		echo "</div>";
		echo "</span>";
		echo "<div class='clear'></div>";
  		echo"</li>";
	}
	?>
  </ul></div></div>
	<div class="clear"></div></div></div>
	<div class="clear"></div>
	<div id="OSC_Footer">© 赛斯特(WWW.SYSIT.ORG)</div>
</div>
<script src="javascript/jquery-1.12.4.js"></script>
<script>
	$(function(){
		$(".button").on('click',function(){
			$("#open").css('display',"block");
			var $send = $(this).siblings(".senduser").val();
			var $userid = $(this).siblings(".userid").val();
			$('input[name=senduser]').val($send);
			$('input[name=userid]').val($userid);
		});




	});
</script>
</body></html>