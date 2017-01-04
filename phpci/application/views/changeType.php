<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN"><head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="Content-Language" content="zh-CN">
  <title>博客设置/分类管理 Johnny的博客 - SYSIT个人博客</title>

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
    	<span id="AdminTitle">博客设置/分类管理</span>
    </div>
 <?php include "menu.php"?>
    <div id="AdminContent">
<div class="MainForm BlogCatalogManage">
<form  action="blog/updatetype" method="post">
    <h3> 修改博客分类 </h3>
    <div id="error_msg" class="error_msg" style="display:none;"></div>
    <label>分类名称:</label><input name="typename" value="<?php  echo "$typename"?>" size="15" tabindex="1" type="text">
    <label>排序值:</label><input name="typeid" value="<?php echo  "$typeid"?>" size="3" type="text">
    <span class="submit">
	  <input value="修改&nbsp;»" type="submit">
      <input value="取消" type="button">
        </span>
</form>
<form class="BlogCatalogs">
<h3>博客分类 <span>(点击分类名编辑)</span></h3>
<table cellpadding="1" cellspacing="1">
	<tbody><tr>
		<th>序号</th>
		<th>分类名</th>
		<th>文章</th>
		<th>操作</th>
	</tr>
	<?php
	foreach($types as $type){
		echo "<tr>";
		echo "<td class='idx'>".$type->type_id."</td>";
		echo "<td class='name'><a href='editCatalog.htm' title='点击修改博客分类'>".$type->type_name."</a></td>";
		echo "<td class='num'>1</td>";
		echo "<td class='opts'>";
		echo "	<a href='blog/changetype?typeid=$type->type_id&typename=$type->type_name' title='点击修改博客分类'>修改</a>";
		echo "<a href='blog/deltype?typeid=$type->type_id'>删除</a>";
		echo "</td>";
		echo "</tr>";
	}
	?>
	</tbody></table>
</form>
</div>
	</div>
	<div class="clear"></div>
</div>

</div>
	<div class="clear"></div>
	<div id="OSC_Footer">© 赛斯特(WWW.SYSIT.ORG)</div>
</div>

</body></html>