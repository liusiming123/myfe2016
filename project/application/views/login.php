<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>登录</title>
    <base href="<?php echo site_url(); ?>">
    <link rel="stylesheet" href="css/common.css"/>
    <link rel="stylesheet" href="css/login.css"/>

    <script src="javascript/jquery-1.12.4.js"></script>
    <script src="javascript/commont.js"></script>

</head>
<body>
<section>
    <div class="wrap">
        <div class="section_placeholder"></div>
        <div class="section_content">
            <div class="section_content_placeholder"></div>
            <h1 class="section_content_title">欢迎登陆</h1>
            <form class="section_content_list" method="post" action="javascript:;">
                <div class="section_content_list_username">
                    <span></span>
                    <input name="username" type="text" placeholder="请输入手机号/邮箱号" class="username"/>
                </div>
                <div class="section_content_list_password">
                    <span></span>
                    <input name="password" type="password" placeholder="请输入密码" class="password"/>
                </div>
                <div class="section_content_list_verification">
                    <span></span>
                    <input type="text" class="captcha_input" placeholder="请输入验证码" name="captcha_c"/>
                    <a href="javascript:;" title="看不清，换一张" class="captcha" ><?php echo $image;?></a>
                    <a href="javascript:;" class="section_content_list_verification_refresh"></a>
                    <p class="captcha_msg"></p>
                </div>
                <div class="section_content_list_role">
                    <a class="section_content_list_mentor selected">资深吃货</a>
                    <a class="section_content_list_seeker ">卖零食的店小二</a>
                    <input type="hidden" name="status" class="status" value="0"/>
                </div>
                <div class="section_content_list_submit">
                    <input type="submit" value="登&nbsp;&nbsp;&nbsp;陆" name="submit" class="login_submit"/>
                    <a href="user/register" class="section_content_list_register">没有账户，马上注册</a>
                </div>
            </form>
        </div>
    </div>
</section>
<script>
    $(function(){

        $('.section_content_list_role a').on('click',function(){
            var $index = $(this).index();
            $(this).addClass('selected').siblings('a').removeClass('selected');
            $(this).siblings('input[type=hidden]').val($index);

        });


        //点击更换验证码
        var $captcha = $('.captcha');
        function loadCaptcha(){
            $captcha.html('');
            $captcha.load("<?php echo site_url('user/show_captcha')?>");
        }
        $('section .section_content_list_verification_refresh').on('click',function(){
            loadCaptcha();
        });


        //根据电话号和email登陆
        var $login = $('.login_submit');
        var $username = $('.username');
        var $password = $('.password');
        var $captchaInput = $('.captcha_input');
        var $status = $('.status:input[type=hidden]');
        var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-])+/;//验证邮箱的正则表达式
        var reg1 = /^0*\d{11}$/;
        check = function (date){
            if(date == "fail"){/*用户名或密码错时*/
                confirm('用户名或密码错');
            } else if(date == "success"){/*全正确时*/
                var $cap =<?php echo $this->session->userdata("captcha");?>;
                if(parseInt($captchaInput.val())==$cap){
                    window.location="<?php echo site_url();?>/user/index";
                }else{
                    confirm('验证码错误');
                    loadCaptcha();
                }
            }
        };
        $login.on('click',function(){
            if(reg.test($username.val())){
                $.get('user/check_login',{
                    'email':$username.val(),
                    'password':$password.val(),
                    'captcha':$captchaInput.val(),
                    'status':$status.val()
                },check,'text');
            }else if(reg1.test($username.val())){
                $.get("user/check_login",{
                    "tel":$username.val(),
                    "password":$password.val(),
                    "captchaVal":$captchaInput.val(),
                    "status":$status.val()
                },check,'text');
            }else{
                confirm('')
            }
        });
    });
</script>
</body>
</html>