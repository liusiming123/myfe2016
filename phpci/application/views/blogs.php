<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN"><head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="Content-Language" content="zh-CN">
  <title>博客文章管理 Johnny的博客 - SYSIT个人博客</title>

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
	<div id="OSC_Content">
<div id="AdminScreen">
    <div id="AdminPath">
        <a href="user/indexlogined">返回我的首页</a>&nbsp;»
    	<span id="AdminTitle">博客文章管理</span>
    </div>
  <?php include "menu.php"?>
    <div id="AdminContent">
<div class="MainForm BlogArticleManage">
  <h3 class="title">共有 3 篇博客，每页显示 40 个，共 1 页</h3>
    <div id="BlogOpts">
        <a href="javascript:;" class="checkedAll">全选</a>&nbsp;|
        <a href="javascript:;" class="checkedNo">取消</a>&nbsp;|
        <a href="javascript:;" class="checkedRev">反向选择</a>&nbsp;|
        <a href="javascript:;" class="checkedDelete">删除选中</a>
</div>
  <ul>
	  <?php
	  		foreach($blogs as $blog){
			echo "<li class='row_1'>";
			echo "<input name='blogid' value=".$blog->blog_id." type='checkbox'>&nbsp;&nbsp;";
			echo "<a href='blog/viewPost?blogid=$blog->blog_id' target='_blank'>".$blog->title."</a>";
            echo "<span>&nbsp;".$blog->type_name."</span>";
			echo "<small>".$blog->creat_time."</small>";
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
<script src="javascript/jquery-1.12.4.js"></script>
<script>
    $(function(){
        var $input = $('input[name=blogid]');
        $('.checkedDelete').on('click',function(){
            var $check = $('input[name=blogid]:checked');
            var $blogid = "";
            for(var i=0;i<$check.length;i++){
                $blogid += $check[i].value+",";
            }
            $blogid = $blogid.slice(0,-1);
            //url, data, callback, dataType
            $.get('blog/delblog',{
                "blogid":$blogid
            },function(result){
                if(result =="su"){
                    $check.parent("li").remove();
                } else if(result =="fail"){
                    alert("删除失败");
                }
            });
        });
        $('.checkedAll').on('click',function(){
            $input.prop('checked','true');

        });
        $('.checkedNo').on('click',function(){
            $input.removeProp("checked")
        });
        $('.checkedRev').on('click',function(){
            $input.each(function(){
                if($(this).prop('checked')==true){
                    $(this).removeProp("checked");
                }else{
                    $(this).prop('checked','true');
                }
            })
        })
    });
</script>
</body>
</html>