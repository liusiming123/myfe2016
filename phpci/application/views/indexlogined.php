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
<div class="BlogList">
<ul>
	<?php
	foreach($blogs as $blog){
	echo "<li class='Blog'>";
	echo "<h2 class='BlogAccess_true BlogTop_0'><a href='blog/viewPost?blogid=$blog->blog_id'>".$blog->title."</a></h2>";
	echo "<div class='outline'>";
	echo "<span class='time'>".$blog->creat_time."</span>";
	echo "<span class='catalog'>分类: <a href='#'>".$blog->type_name."</a>&nbsp</span>";
	echo "<span class='stat'>统计: 1评/4阅</span>";
	echo " <span class='blog_admin'>( <a href='newBlog.htm'>修改</a> | <a href='javascript:delete_blog(24027)'>删除</a> )</span>";
	echo "</div>";
	echo "<div class='TextContent' id='blog_content_24027'>";
	echo "	".$blog->title."";
	echo "<div class='fullcontent'><a href='blog/viewPost?blogid=$blog->blog_id'>阅读全文...</a></div>";
	echo "</div>";
 	echo "</li>";
	}
	?>


</ul>
<div class="clear"></div>
	</div>
<div class="BlogMenu"><div class="admin SpaceModule">
  <strong>博客管理</strong>
  <ul class="LinkLine">
	  <li><a href="blog/newblog">发表博客</a></li>
	  <li><a href="blog/blogtype">博客设置/分类管理</a></li>
	  <li><a href="blog/blogs">文章管理</a></li>
	  <li><a href="blog/blogcomments">博客评论管理</a></li>
  </ul>
</div>
<div class="catalogs SpaceModule">
  <strong>博客分类</strong>
  <ul class="LinkLine">
	  <?php
	  foreach($types as $type){
		  echo "<li><a href='#'>".$type->type_name."</a></li>";
	  }
	  ?>
	  </ul>
</div>
<div class="comments SpaceModule">
  <strong>最新网友评论</strong>
      <ul>
		  <?php
		  foreach($comms as $comm){
			  echo "<li>";
			echo "<span >";
			echo "	<a href='#'><img src='images/portrait.gif'></a>";
			echo "</span>";
			echo "<span >".$comm->content;
			echo "<span class='t'>发布于 11分钟前 <a href='blog/blogcomments'>查看»</a></span>";
			echo "</span>";
			echo "<div class='clear'></div>";
			echo "</li>";
		  }
		  ?>


	  </ul>
  </div></div>
<div class="clear"></div>
<script type="text/javascript" src="javascript/brush.js"></script>
<link type="text/css" rel="stylesheet" href="css/shCore.css">
<link type="text/css" rel="stylesheet" href="css/shThemeDefault.css">


	</div>
	<div class="clear"></div>
	<div id="OSC_Footer">© 赛斯特(WWW.SYSIT.ORG)</div>
</div>
</div>
</body></html>