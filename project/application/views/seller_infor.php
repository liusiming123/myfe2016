<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>个人信息</title>
    <base href="<?php echo site_url(); ?>">
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/common.css"/>
    <link rel="stylesheet" href="css/header.css"/>
    <link rel="stylesheet" href="css/footer.css"/>

    <link rel="stylesheet" href="css/information.css"/>
    <link rel="stylesheet" href="css/changePwd.css"/>
    <link rel="stylesheet" href="css/order.css"/>
    <link rel="stylesheet" href="css/comment.css"/>
    <link rel="stylesheet" href="css/snack-admin.css"/>
    <script src="javascript/jquery-1.12.4.js"></script>
    <script src="javascript/upload-picture.js"></script>
    <script src="javascript/birthday.js"></script>
    <script src="javascript/index.js"></script>
    <script src="javascript/commont.js"></script>
</head>
<body>
<?php include 'header.php'?>
<div class="warp">
    <div id="menu">
        <p>个人中心</p>
        <ul>
            <span class="span1">个人资料</span>
            <li><a href="seller/information/#person-information">个人信息</a></li>
            <li><a href="seller/information/#change-pwd">修改密码</a></li>
            <li><a href="seller/information/#snack-admin">商品管理</a></li>
        </ul>
        <ul>
            <span class="span2">我的交易</span>
            <li><a href="seller/information/#order" >订单管理</a></li>
            <li><a href="seller/information/#comment">商品评价</a></li>
        </ul>
    </div>
    <div>
        <div id="person-information">
            <?php $un = $this->session->userdata('userinfo');?>
        <h3>个人信息修改</h3>
        <form action="seller/seller" method="post">
            <div class="upload-picture">
                <div id="prvid"><img src="images/upload-picture.png" alt=""/></div>
                <label for="files" class="files">修改头像</label>
                <input id="files" type="file" name="files" onchange="previewImage(this, 'prvid')" multiple="multiple">
            </div>
            <div class="username">
                店铺名字：<span style="width: 169px"><?php echo $un->sel_name?></span>
                <span class="change">修改</span>
            </div>
            <div class="sel-describe">
                <p>店铺描述：</p>
                <textarea name="sel-describe" id="" cols="30" rows="10"><?php echo $un->sel_describe?></textarea>
            </div>
            <div class="information-content">
                <div class="name">
                    <p>真实姓名：</p>
                    <span style="color: black"><?php echo $un->real_name?></span>
                </div>
                <div class="id">
                    <p>身份证号码：</p>
                    <span style="color: black"><?php echo $un->id?></span>
                </div>
                <div>
                    <p>电话：</p>
                    <input type="text" value="<?php echo $un->tel?>" name="tel"/>
                </div>
                <div id="yes-sex">
                    <p>性别：</p>
                    <label for="nan" class="sex"></label>
                    <input type="radio" value="男" name="sex" id="nan"
                        <?php
                        if($un->sex == '男'){
                            ?>
                            checked="true"
                            <?php
                        }
                        ?>
                    />男
                    <label for="nv" class="sex" style="margin-left: 10px"></label>
                    <input type="radio" value="女" name="sex" id="nv"
                        <?php
                        if($un->sex == '女'){
                            ?>
                            checked="true"
                            <?php
                        }
                        ?>
                    />女
                </div>
                <div id="birthday-container">
                    <p>生日：</p>
                    <?php
                    if($un->birth){
                        $pieces = explode("-", $un->birth);
                        if(strrchr($pieces[1],'0')){
                            $month = substr( $pieces[1],1);
                        }else{
                            $month = $pieces[1];
                        }
                        if(strrchr($pieces[2],'0')){
                            $day = substr( $pieces[2],1);
                        }else{
                            $day = $pieces[1];
                        }
                        ?>
                        <select name="year"><option value="<?php echo $pieces[0];?>"><?php echo $pieces[0];?>年</option></select>
                        <select name="month"><option value="<?php echo $month;?>"><?php echo $month;?>月</option></select>
                        <select name="day"><option value="<?php echo $day;?>"><?php echo $day;?>日</option></select>
                        <?php
                    }else{
                        ?>
                        <select name="year"></select>
                        <select name="month"></select>
                        <select name="day"></select>
                        <?php
                    }
                    ?>
                </div>
                <div>
                    <p>电子邮件：</p>
                    <input type="text" value="<?php echo $un->email; ?>" name="email"/>
                </div>
                <input type="submit" value="保存修改"/>
            </div>
        </form>
    </div>
        <div id="change-pwd">
            <h3>修改密码</h3>
            <form action="seller/change_password" method="get">
                <div class="change-pwd">
                    <div>
                        <p>旧密码：</p>
                        <input type="password" value="" class="old-password"/>
                        <span class="pass-tip" style="color: red"></span>
                    </div>
                    <div>
                        <p>新密码：</p>
                        <input type="password" value="" class="new-password"/>
                    </div>
                    <div>
                        <p>确认密码：</p>
                        <input type="password" value="" name="password" class="new-password1"/>
                        <span class="password-tip" style="color: red"></span>
                    </div>
                    <input type="submit" value="保存修改" disabled="disabled"/>
                </div>
            </form>
        </div>
        <div id="snack-admin">
            <div class="snack-admin-title">
                <h3>商品管理</h3>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="thumbnail add-snack">
                        <a href="seller/add_snack">
                            <img src="images/upload-picture.png" alt="" width="100%"/>
                            <p>添加商品</p>
                        </a>
                    </div>
                </div>
                <?php
                    foreach($snacks as $snack){
                ?>
                        <div class="col-md-3">
                            <div class="thumbnail">
                                <a href="#">
                                    <img src="<?php echo $snack->photo?>" alt="零食"/>
                                </a>
                                <div class="food-name">
                                    <h4 style="margin-bottom: 2px"><?php echo $snack->sn_name?></h4>
                                    <h4 style="font-size: 13px;margin: 0;float: left;height: 28px ;width: 100%">
                                        <?php echo $snack->sn_describe?>
                                    </h4>
                                    <span><strong>会员价￥<?php echo $snack->member_price?></strong></span><span>￥<?php echo $snack->price?></span>
                                </div>
                                <div class="food-shop">
                                    <a class="btn btn-danger" href="#">编辑商品</a>
                                    <a class="btn btn-danger collect" href="#">删除商品</a>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                ?>


            </div>
        </div>
        <div id="order">
            <h3>订单管理</h3>
            <div class="order-top">
                <div class="th th-item">
                    <td class="td-inner">商品</td>
                </div>
                <div class="th th-price">
                    <td class="td-inner">单价</td>
                </div>
                <div class="th th-number">
                    <td class="td-inner">数量</td>
                </div>
                <div class="th th-amount">
                    <td class="td-inner">合计</td>
                </div>
                <div class="th th-status">
                    <td class="td-inner">交易状态</td>
                </div>
                <div class="th th-change">
                    <td class="td-inner">交易操作</td>
                </div>
            </div>
            <div class="order-status">
                <div class="order-title">
                    <span>成交时间：2015-12-20</span>
                </div>
                <div class="order-content">
                    <ul class="item-list">
                        <li class="td td-item">
                            <a href="#" class="J-MakePoint">
                                <div class="item-pic">
                                    <img src="images/ls10.jpg" class="itempic J-ItemImg">
                                </div>
                                <div class="item-info">
                                    <div>
                                        <p>良品铺子 手剥松子218g 坚果炒货 </p>
                                        <p class="info-title">名称：<span style="color: #dd546d">巴西松子</span> </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="td td-price">
                            <div class="item-price">
                                33.00
                            </div>
                        </li>
                        <li class="td td-number">
                            <div class="item-number">
                                <span>×</span>2
                            </div>
                        </li>
                        <li class="td td-amount">
                            <div class="item-amount">
                                676.00
                            </div>
                        </li>
                        <li class="td td-status">
                            <div class="item-status">
                                <p class="Mystatus">交易成功</p>
                            </div>
                        </li>
                        <li class="td td-change">
                            <button class="am-btn">删除订单</button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="order-status">
                <div class="order-title">
                    <span>成交时间：2015-12-20</span>
                </div>
                <div class="order-content">
                    <ul class="item-list">
                        <li class="td td-item">
                            <a href="#" class="J-MakePoint">
                                <div class="item-pic">
                                    <img src="images/ls10.jpg" class="itempic J-ItemImg">
                                </div>
                                <div class="item-info">
                                    <div>
                                        <p>良品铺子 手剥松子218g 坚果炒货 </p>
                                        <p class="info-title">名称：<span style="color: #dd546d">巴西松子</span> </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="td td-price">
                            <div class="item-price">
                                33.00
                            </div>
                        </li>
                        <li class="td td-number">
                            <div class="item-number">
                                <span>×</span>2
                            </div>
                        </li>
                        <li class="td td-amount">
                            <div class="item-amount">
                                676.00
                            </div>
                        </li>
                        <li class="td td-status">
                            <div class="item-status">
                                <p class="Mystatus">交易成功</p>
                            </div>
                        </li>
                        <li class="td td-change">
                            <button class="am-btn">删除订单</button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="order-status">
                <div class="order-title">
                    <span>成交时间：2015-12-20</span>
                </div>
                <div class="order-content">
                    <ul class="item-list">
                        <li class="td td-item">
                            <a href="#" class="J-MakePoint">
                                <div class="item-pic">
                                    <img src="images/ls10.jpg" class="itempic J-ItemImg">
                                </div>
                                <div class="item-info">
                                    <div>
                                        <p>良品铺子 手剥松子218g 坚果炒货 </p>
                                        <p class="info-title">名称：<span style="color: #dd546d">巴西松子</span> </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="td td-price">
                            <div class="item-price">
                                33.00
                            </div>
                        </li>
                        <li class="td td-number">
                            <div class="item-number">
                                <span>×</span>2
                            </div>
                        </li>
                        <li class="td td-amount">
                            <div class="item-amount">
                                676.00
                            </div>
                        </li>
                        <li class="td td-status">
                            <div class="item-status">
                                <p class="Mystatus">交易成功</p>
                            </div>
                        </li>
                        <li class="td td-change">
                            <button class="am-btn">删除订单</button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="order-status">
                <div class="order-title">
                    <span>成交时间：2015-12-20</span>
                </div>
                <div class="order-content">
                    <ul class="item-list">
                        <li class="td td-item">
                            <a href="#" class="J-MakePoint">
                                <div class="item-pic">
                                    <img src="images/ls10.jpg" class="itempic J-ItemImg">
                                </div>
                                <div class="item-info">
                                    <div>
                                        <p>良品铺子 手剥松子218g 坚果炒货 </p>
                                        <p class="info-title">名称：<span style="color: #dd546d">巴西松子</span> </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="td td-price">
                            <div class="item-price">
                                33.00
                            </div>
                        </li>
                        <li class="td td-number">
                            <div class="item-number">
                                <span>×</span>2
                            </div>
                        </li>
                        <li class="td td-amount">
                            <div class="item-amount">
                                676.00
                            </div>
                        </li>
                        <li class="td td-status">
                            <div class="item-status">
                                <p class="Mystatus">交易成功</p>
                            </div>
                        </li>
                        <li class="td td-change">
                            <button class="am-btn">删除订单</button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="order-status">
                <div class="order-title">
                    <span>成交时间：2015-12-20</span>
                </div>
                <div class="order-content">
                    <ul class="item-list">
                        <li class="td td-item">
                            <a href="#" class="J-MakePoint">
                                <div class="item-pic">
                                    <img src="images/ls10.jpg" class="itempic J-ItemImg">
                                </div>
                                <div class="item-info">
                                    <div>
                                        <p>良品铺子 手剥松子218g 坚果炒货 </p>
                                        <p class="info-title">名称：<span style="color: #dd546d">巴西松子</span> </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="td td-price">
                            <div class="item-price">
                                33.00
                            </div>
                        </li>
                        <li class="td td-number">
                            <div class="item-number">
                                <span>×</span>2
                            </div>
                        </li>
                        <li class="td td-amount">
                            <div class="item-amount">
                                676.00
                            </div>
                        </li>
                        <li class="td td-status">
                            <div class="item-status">
                                <p class="Mystatus">交易成功</p>
                            </div>
                        </li>
                        <li class="td td-change">
                            <button class="am-btn">删除订单</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="comment">
            <h3>评价管理</h3>
            <ul>
                <li>
                    <div class="comment-people">
                        <div class="photo">
                            <img src="images/photo.jpg" alt=""/>
                        </div>
                        <div>crazy</div>
                    </div>
                    <div class="comment-content">
                        <p>哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈，拉克丝房价空间很大桂红的哈v哦，i是多久哦发哈搜狐够狠v看到女警，时间福建省电力发票收到</p>
                        <img src="images/ls1.jpg" alt=""/>
                    </div>
                    <div class="comment-snack">
                        <p>开心果</p>
                    </div>
                    <div class="comment-time">
                        2017-04-05
                    </div>
                </li>
                <li>
                    <div class="comment-people">
                        <div class="photo">
                            <img src="images/photo.jpg" alt=""/>
                        </div>
                        <div>crazy</div>
                    </div>
                    <div class="comment-content">
                        <p>哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈，拉克丝房价空间很大桂红的哈v哦，i是多久哦发哈搜狐够狠v看到女警，时间福建省电力发票收到</p>
                        <img src="images/ls10.jpg" alt=""/>
                    </div>
                    <div class="comment-snack">
                        <p>开心果</p>
                    </div>
                    <div class="comment-time">
                        2017-04-05
                    </div>
                </li>
                <li>
                    <div class="comment-people">
                        <div class="photo">
                            <img src="images/photo.jpg" alt=""/>
                        </div>
                        <div>crazy</div>
                    </div>
                    <div class="comment-content">
                        <p>哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈，拉克丝房价空间很大桂红的哈v哦，i是多久哦发哈搜狐够狠v看到女警，时间福建省电力发票收到</p>
                        <img src="images/ls1.jpg" alt=""/>
                    </div>
                    <div class="comment-snack">
                        <p>开心果</p>
                    </div>
                    <div class="comment-time">
                        2017-04-05
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<?php include 'footer.php'?>

<script>
    $(function(){
        //日期年月日三级联动
        $("#birthday-container").birthday();


        //判断该显示哪个div
        var $url =location.hash;
        if($url){
            $($url).show().siblings('div').hide();
        }else{
            $('#snack-admin').show().siblings('div').hide();
        }
        //点击左侧导航栏切换内容
        var $menu = $('#menu ul li');
        $('a',$menu).on('click',function(){
            var $fu ='#';
            var $str = $fu+$(this).prop('href').split('#')[1].toString();
            $($str).show().siblings('div').hide();
        });
        //用户名点击修改变成input框
        $('#person-information .username .change').on('click',function(){
            var $value = $(this).siblings('span').html();
            $(this).siblings('span').remove();
            var $input = $('<input type="text" name="sel-name" />').css({
                'border':'1px solid #dd546d',
                'color':'#999',
                'height':'20px',
                'width':'169px',
                'font-size':'18px'
            }).val($value);
            if($(this).siblings('input[type=text]').length==0){
                $input.insertBefore($(this));
                $(this).siblings('.diaplay-submit').css('display','inline-block');
                $(this).css('display','none');
            }
        });
            //ajax判断旧密码是否正确
            var $changePwd = $('#change-pwd .change-pwd');
            var $oldPassword = $('.old-password',$changePwd);
            var $passTip = $('.pass-tip',$changePwd);
            var $newPassword = $('.new-password',$changePwd);
            var $newPassword1 = $('.new-password1',$changePwd);
            var $passwordTip = $('.password-tip',$changePwd);
            var $passSubmit = $('input[type=submit]',$changePwd);
            $oldPassword.on('blur',function(){
                $.get("seller/check_password",{
                    'password':$oldPassword.val()
                },function(data){
                    if(data=='success'){
                        $passTip.html('(密码正确)')
                    }else{
                        $passTip.html('(密码不正确)');
                    }
                },'text');
            });
            //判断俩次密码是否一致
            $newPassword1.on('blur',function(){
                if($newPassword.val()==$newPassword1.val()){
                    $passSubmit.removeAttr('disabled');
                    $passwordTip.html('');
                }else{
                    $passwordTip.html('（密码不一致）');
                    $passSubmit.attr('disabled','disabled');
                }
            });



    });
</script>
</body>
</html>