<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN"><head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="Content-Language" content="zh-CN">
  <title>修改登录密码 Johnny的博客 - SYSIT个人博客</title>

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
    	<span id="AdminTitle">修改登录密码</span>
    </div>
<?php include "menu.php"?>
    <div id="AdminContent">
<div class="MainForm">
<form class="AutoCommitJSONForm" action="user/revise" method="POST">
<h2>修改我的登录密码</h2>
<table width="100%">
	<tbody><tr>
		<th width="110">旧的登录密码</th>		
		<td>
			<input name="pwd" size="20" class="TEXT" tabindex="1" type="password">&nbsp;&nbsp;<span class="tip"></span>&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="#" target="_blank">忘记登录密码</a>
		</td>    		
	</tr>
	<tr>
		<th>新密码</th>		
		<td><input name="newpwd1" size="20" class="TEXT" tabindex="2" type="password"></td>
	</tr>
	<tr>
		<th>再次输入新密码</th>		
		<td><input name="newpwd2" size="20" class="TEXT" tabindex="3" type="password"></td>    		
	</tr>
	<tr><th colspan="2"></th></tr>
	<tr class="submit">
		<th></th>
		<td>
		<input value="修改密码" class="BUTTON SUBMIT" tabindex="4" type="submit" name="submit" disabled="true">
		<span id="error_msg" style="display:none"></span>
		</td>
	</tr>
</tbody></table>
</form>
</div></div>
	<div class="clear"></div>
</div>
</div>
	<div class="clear"></div>
	<div id="OSC_Footer">© 赛斯特(WWW.SYSIT.ORG)</div>
</div>
<script src="javascript/jquery-1.12.4.js"></script>
<script>
	$(function(){
		var $pwd = $("input[name=pwd]");
		var $tip = $(".tip");
		var $submit = $("input[name=submit]");
		var $newpwd1 = $("input[name=newpwd1]");
		var $newpwd2 = $("input[name=newpwd2]");
		$pwd.on('blur',function(){
			var pwdval =$pwd.val();
			$.get("user/judgePwd",{
				"pwdval":pwdval
			},function(result){
				if(result == "success"){
					$tip.html("密码输入正确");
				}else{
					$tip.html("密码输入不正确，请重新输入");
				}
			})
		});
		$newpwd2.on('blur',function(){
			if($newpwd1.val() == $newpwd2.val()){
				$submit.removeAttr("disabled");
			}
		});
	})
</script>
</body></html>