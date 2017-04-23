<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>注册</title>
    <base href="<?php echo site_url(); ?>">
    <link rel="stylesheet" href="css/common.css"/>
    <link rel="stylesheet" href="css/register.css"/>
    <script src="javascript/jquery-1.12.4.js"></script>
    <script src="javascript/commont.js"></script>
</head>
<body>
<section>
    <div class="wrap">
        <div class="section_placeholder"></div>
        <div class="section_content">
            <div class="section_content_placeholder"></div>
            <h1 class="section_content_title">欢迎注册</h1>
            <form class="section_content_list" method="post" action="javascript:;" >
                <div class="section_content_list_role">
                    <a class="section_content_list_mentor selected">资深吃货</a>
                    <a class="section_content_list_seeker ">卖零食的店小二</a>
                    <input type="hidden" id="status" name="status" class="status" value="0"/>
                </div>
                <div class="user">
                    <div class="section_content_list_username">
                        <span></span>
                        <input type="text" placeholder="请输入用户名" name="username" class="username"/>
                        <span class="tip-uname"></span>
                        <p class="msg_username"></p>
                    </div>
                    <div class="section_content_list_password">
                        <span class="ph"></span>
                        <input type="text" placeholder="请输入手机号" name="tel" class="tel"/>
                        <p class="msg_psd"></p>
                    </div>
                    <div class="section_content_list_password">
                        <span></span>
                        <input type="password" placeholder="请输入密码" name="password" class="password"/>
                        <p class="msg_psd"></p>
                    </div>
                    <div class="section_content_list_password">
                        <span></span>
                        <input type="password" placeholder="请确认密码" name="password1" class="password1"/>
                        <span class="tip-pwd"></span>
                        <p class="msg_psd"></p>
                    </div>
                    <div class="section_content_list_verification2">
                        <span></span>
                        <input type="text" placeholder="请输入验证码" class="image_verification captcha_input" name="captcha_c"/>
                        <a href="javascript:;" title="看不清，换一张" class="captcha" ><?php echo $image;?></a>
                        <a href="javascript:;" class="section_content_list_verification2_refresh"></a>
                        <span class="msg_image_verification"></span>
                        <p class="captcha_msg"></p>
                    </div>
                </div>
                <div class="seller">
                    <div class="section_content_list_username">
                        <span></span>
                        <input type="text" placeholder="请输入真实姓名" name="realName" class="realName" />
                        <span class="tip-uname1"></span>
                        <p class="msg_username"></p>
                    </div>
                    <div class="section_content_list_username">
                        <span></span>
                        <input type="text" placeholder="请输入身份证号码" name="id" class="id"/>
                        <p class="msg_username"></p>
                    </div>
                    <div class="section_content_list_password">
                        <span class="ph"></span>
                        <input type="text" placeholder="请输入手机号" name="sellTel" class="sellTel"/>
                        <p class="msg_psd"></p>
                    </div>
                    <div class="section_content_list_password">
                        <span></span>
                        <input type="password" placeholder="请输入密码" name="sellPassword" class="sellPassword"/>
                        <p class="msg_psd"></p>
                    </div>
                    <div class="section_content_list_password">
                        <span></span>
                        <input type="password" placeholder="请确认密码" name="sellPassword1" class="sellPassword1"/>
                        <span class="tip-pwd1"></span>
                        <p class="msg_psd"></p>
                    </div>
                    <div class="section_content_list_verification2">
                        <span></span>
                        <input type="text" placeholder="请输入验证码" class=".image_verification captcha_input1" name="captcha_c"/>
                        <a href="javascript:;" title="看不清，换一张" class="captcha" ><?php echo $image;?></a>
                        <a href="javascript:;" class="section_content_list_verification2_refresh"></a>
                        <span class="msg_image_verification"></span>
                        <p class="captcha_msg"></p>
                    </div>
                </div>
                <div class="section_content_list_submit">
                    <input type="submit" value="注&nbsp;&nbsp;&nbsp;册" name="submit" class="login_submit"/>
                    <div class="section_content_list_submit_login">
                        <a href="user/login" >已有账号？马上登陆</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<script>
    $(function(){
        $('.seller').hide();
        $('.section_content_list_role a').on('click',function(){
            var $index = $(this).index();
            $(this).addClass('selected').siblings('a').removeClass('selected');
            $(this).siblings('input[type=hidden]').val($index);
            if($index==0){
                $('.user').show();
                $('.seller').hide();
            }else if($index==1){
                $('.user').hide();
                $('.seller').show();
            }
        });

        //点击更换验证码
        var $captcha = $('.captcha');
        $('section .section_content_list_verification2_refresh').on('click',function(){
            $captcha.html('');
            $captcha.load("<?php echo site_url('user/show_captcha')?>");
        });


        var $status =$('.status');
        //买家
        var $username = $('.username');//用户名
        var $tel = $('.tel');
        var $password  = $('.password');
        var $password1  = $('.password1');
        var $captchaInput = $('.captcha_input');
        var $tipUname = $('.tip-uname');
        var $tipPwd = $('.tip-pwd');
        var $loginSubmit = $('.login_submit');
        //ajax提交用户名是否可用
        $username.on('blur',function(){
                $.get("user/check_username",{"username":$username.val()},function(data){
                    if(data == "success"){
                        $tipUname.html("(该用户名可用)");
                        $loginSubmit.removeAttr("disabled");
                    }else{
                        $tipUname.html("(该用户名不可用)");
                        $loginSubmit.attr("disabled","true");
                    }
                });
        });
        var $cap =<?php echo $this->session->userdata("captcha");?>;
        $captchaInput.on('blur',function(){
            if(parseInt($captchaInput.val())!=$cap){
                confirm('验证码错误');
            }
        });
        $password1.on('blur',function(){
            if($password.val()!=$password1.val()){
                $tipPwd.html('(密码不一致)');
                $loginSubmit.attr("disabled","true");
            }else{
                $tipPwd.html('(密码正确)');
                $loginSubmit.removeAttr("disabled");

            }
        });
        //卖家
        var $realname = $('.realName');
        var $id = $('.id');
        var $sellTel = $('.sellTel');
        var $sellPassword = $('.sellPassword');
        var $sellPassword1 = $('.sellPassword1');
        var $captchaInput1 = $('.captcha_input1');
        var $tipUname1 = $('.tip-uname1');
        var $tipPwd1 = $('.tip-pwd1');

        $captchaInput1.on('blur',function(){
            if(parseInt($captchaInput1.val())!=$cap){
                confirm('验证码错误');
            }
        });

        $sellPassword1.on('blur',function(){
            if($sellPassword.val()!=$sellPassword1.val()){
                $tipPwd1.html('(密码不一致)');
                $loginSubmit.attr("disabled","true");
            }else{
                $tipPwd1.html('(密码正确)');
                $loginSubmit.removeAttr("disabled");
            }
        });
        $realname.on('blur',function(){
            $.get("seller/check_realname",{"realname":$realname.val()},function(data){
                if(data == "success"){
                    $tipUname1.html("(该用户名可用)");
                    $loginSubmit.removeAttr("disabled");
                }else{
                    $tipUname1.html("(该用户名不可用)");
                    $loginSubmit.attr("disabled","true");
                }
            });
        });
        $loginSubmit.on('click',function(){
            if($status.val()==0){
                console.log('1');
                $.get('user/reg_user',{
                    'username':$username.val(),
                    'tel':$tel.val(),
                    'password':$password.val()
                },function(data){
                    if(data=='success'){
                        window.location="<?php echo site_url();?>/user/login";
                    }else{
                        confirm('注册失败');
                    }
                },'text');
            }else if($status.val()==1){
                $.get('seller/reg_seller',{
                    'realname':$realname.val(),
                    'id':$id.val(),
                    'sellTel':$sellTel.val(),
                    'sellPassword':$sellPassword.val()
                },function(data){
                    if(data=='success'){
                        window.location="<?php echo site_url();?>/user/login";
                    }else{
                        confirm('注册失败');
                    }
                },'text');
            }
        });
    });
</script>
</body>
</html>