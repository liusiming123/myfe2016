<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="Content-Language" content="zh-CN">
  <title>测试文章2 -  Johnny的博客 - SYSIT个人博客</title>

	<base href="<?php echo site_url(); ?>">

    <link rel="stylesheet" href="css/space2011.css" type="text/css" media="screen">
  <link rel="stylesheet" type="text/css" href="css/jquery.css" media="screen">
  <style type="text/css">
    body,table,input,textarea,select {font-family:Verdana,sans-serif,宋体;}	
  </style>
</head>
<body>
<div id="OSC_Screen"><!-- #BeginLibraryItem "/Library/OSC_Banner.lbi" -->
<?php include "header.php"?>
	<div id="OSC_Content"><div class="SpaceChannel">
	<div id="portrait"><a href="adminIndex.htm"><img src="images/portrait.gif" alt="Johnny" title="Johnny" class="SmallPortrait" user="154693" align="absmiddle"></a></div>
    <div id="lnks">
		<strong><?php echo $un->username;?>的博客</strong>
		<div><a href="user/indexlogined">Me的博客列表</a>&nbsp;
			<a href="user/adminIndex">个人空间</a>
		</div>
	</div>
	<div class="clear"></div>
</div>
<div class="Blog">
	<?php
	foreach($blogs as $key=>$blog){
		if($blogid == $blogs[$key]->blog_id){
	?>
			<div class="BlogTitle">
				<h1><?php echo $blogs[$key]->title;?></h1>
				<div class="BlogStat">
						<span class="admin">
							<a href="newBlog.htm">编辑</a>&nbsp;|&nbsp;
							<a href="">删除</a>
						</span>
						发表于<?php echo $blogs[$key]->creat_time;?>,
					已有<strong>4</strong>次阅读
					共<strong><a href="#comments">2</a></strong>个评论
				</div>
			</div>
		    <div class="BlogContent TextContent"><?php echo $blogs[$key]->content;?></div>
		    <div class="BlogLinks">
				<ul>
					<li>上篇<?php
							echo "<span> (";
							if($key == 0){
								echo "";
								echo ")</span>：<a class='prev'>";
							}else{
								echo $blogs[$key-1]->creat_time;
								echo ")</span>：<a href='blog/viewPost?blogid=".$blogs[$key-1]->blog_id."' class='prev'>";
							}

							if($key == 0){
								echo"没有更多文章";
							}else{
								echo $blogs[$key-1]->title;
							}
							?></a></li>
					<li>下篇 <?php
							echo "<span>(";
							if($key == sizeof($blogs)-1){
								echo "";
								echo ")</span>：<a class='next'>";
							}else{
								echo $blogs[$key+1]->creat_time;
								echo ")</span>：<a href='blog/viewPost?blogid=".$blogs[$key+1]->blog_id."' class='next'>";
							}

							if($key == sizeof($blogs)-1){
								echo"没有更多文章";
							}else{
								echo $blogs[$key+1]->title;
							}
							?></a></li>
				</ul>
		    </div>
	<?php
		}
	}
	?>

    <div class="BlogComments">
    <h2><a name="comments" href="#postform" class="opts">发表评论»</a>共有 2 条网友评论</h2>
			<ul id="BlogComments">
	<li id="cmt_24026_154693_261665458">
	<div class="portrait">
		<a href="#"><img src="images/portrait.gif" alt="sw0411" title="sw0411" class="SmallPortrait" user="154693" align="absmiddle"></a>			
	</div>
	<div class="body">
		<div class="title">
			sw0411 发表于 2011-06-18 00:14    			
        	        	  <a href="javascript:delete_c(24026,154693,261665458)">删除</a>
								</div>
		<div class="post" "="">测试评论</div>
		<div id="inline_reply_of_24026_154693_261665458" class="inline_reply"></div>
    </div>
	<div class="clear"></div>
</li><li id="cmt_24026_154693_261665461">
	<div class="portrait">
		<a href="#"><img src="images/portrait.gif" alt="sw0411" title="sw0411" class="SmallPortrait" user="154693" align="absmiddle"></a>			
	</div>
	<div class="body">
		<div class="title">
			sw0411 发表于 2011-06-18 00:15    			
        	        	  <a href="javascript:delete_c(24026,154693,261665461)">删除</a>
								</div>
		<div class="post" "="">测试评论111</div>
		<div id="inline_reply_of_24026_154693_261665461" class="inline_reply"></div>
    </div>
	<div class="clear"></div>
</li>	</ul>
		  </div>  
  <div class="CommentForm">
    <a name="postform"></a>
    <form id="form_comment" action="" method="POST">
      <textarea id="ta_post_content" name="content" style="width: 450px; height: 100px;"></textarea><br>
	  <input value="发表评论" id="btn_comment" class="SUBMIT" type="submit">
	  <span id="cmt_tip">文明上网，理性发言</span>
    </form>
	<a href="#" class="more">回到顶部</a>
	<a href="#comments" class="more">回到评论列表</a>
  </div>
  </div>
<div class="BlogMenu"><div class="RecentBlogs SpaceModule">
	<strong>最新博文</strong><ul>
			<?php
			foreach($blogs as $blog){
				echo "<li><a href='blog/viewPost?blogid=$blog->blog_id'>".$blog->title."</a></li>";
			}
			?>
			<li class="more"><a href="blog/blogs">查看所有博文»</a></li>
    </ul>
</div>

</div>
<div class="clear"></div>

<div id="inline_reply_editor" style="display:none;">
<div class="CommentForm">
	<form id="form_inline_comment" action="/action/blog/add_comment?blog=24026" method="POST">
	  <input id="inline_reply_id" name="reply_id" value="" type="hidden">          
      <textarea name="content" style="width: 450px; height: 60px;"></textarea><br>
	  <input value="回复" id="btn_comment" class="SUBMIT" type="submit"> 
	  <input value="关闭" class="SUBMIT" id="btn_close_inline_reply" type="button"> 文明上网，理性发言
    </form>
</div>
</div>
<link type="text/css" rel="stylesheet" href="css/shCore.css">
<link type="text/css" rel="stylesheet" href="css/shThemeDefault.css">
</div>
	<div class="clear"></div>
	<div id="OSC_Footer">© 赛斯特(WWW.SYSIT.ORG)</div>
</div>
</body></html>