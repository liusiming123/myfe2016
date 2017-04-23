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
    <link rel="stylesheet" href="css/address.css"/>
    <link rel="stylesheet" href="css/order.css"/>
    <link rel="stylesheet" href="css/comment.css"/>
    <link rel="stylesheet" href="css/user-collect.css"/>

    <script src="javascript/jquery-1.12.4.js"></script>
    <script src="javascript/jquery.cityselect.js"></script>
<!--    <script src="javascript/upload-picture.js"></script>-->
    <script src="javascript/birthday.js"></script>
    <script src="javascript/index.js"></script>
    <script src="javascript/commont.js"></script>
</head>
<body>
   <?php include 'header.php'?>
   <div id="fbg"></div>
   <div id="mask">
       <div class="edit-address">
                   <form action="javascript:;">
                       <div class="add-address">
                           <div>
                               <p>收货人姓名：</p>
                               <input type="text" value="" name="name" class="con-name"/>
                           </div>
                           <div>
                               <p>电话：</p>
                               <input type="text" value="" name="tel" class="tel"/>
                           </div>
                           <div class="edit-city">
                               <p>所在地：</p>
                               <select name="prov" class="prov"></select>
                               <select name="city" class="city">请选择</select>
                               <select name="dist" class="dist">请选择</select>
                           </div>
                           <div>
                               <p>详细地址：</p>
                               <textarea name="" id="" cols="30" rows="10" placeholder="请输入详细地址..." class="address-des"></textarea>
                           </div>
                           <input type="submit" value="保存修改" class="edit-submit"/>
                       </div>
                   </form>
        </div>
   </div>
    <div class="warp">
        <div id="menu">
            <p>个人中心</p>
            <ul>
                <span class="span1">个人资料</span>
                <li><a href="user/information/#person-information">个人信息</a></li>
                <li><a href="user/information/#change-pwd">修改密码</a></li>
                <li><a href="user/information/#address">地址管理</a></li>
            </ul>
            <ul>
                <span class="span2">我的交易</span>
                <li><a href="user/information/#order">订单管理</a></li>
                <li><a href="user/information/#comment">商品评价</a></li>
            </ul>
            <ul>
                <span class="span3">我的收藏</span>
                <li><a href="user/information/#collect">收藏</a></li>
            </ul>
        </div>
        <div>
            <div id="person-information">
                <?php $un = $this->session->userdata('userinfo');?>
                <h3>个人信息修改</h3>
                <form action="user/photo_name" method="post">
                    <div class="upload-picture">
                        <div id="prvid"><img src="images/upload-picture.png" alt=""/></div>
                        <label for="files" class="files">修改头像</label>
                        <input id="files" type="file" name="files" onchange="previewImage(this, 'prvid')" multiple="multiple">
                    </div>
                    <div class="username">
                        用户名：<span style="width: 169px"><?php echo $un->name;?></span>
                        <span class="change">修改</span>
                        <input type="submit" value='保存修改' class="diaplay-submit"/>
                    </div>
                </form>
                <form action="user/user" method="post">
                    <div class="information-content">
                        <div class="open-member">
                            <p>开通会员：</p>
                            <label for="yes" class="member"></label>
                            <input type="radio" value="1" name="member" id="yes"
                                   <?php
                                        if($un->member == 1){
                                   ?>
                                        checked="true"
                                   <?php
                                        }
                                   ?>
                            />是
                            <label for="no" class="member" style="margin-left: 10px"></label>
                            <input type="radio" value="0" name="member" id="no"
                                <?php
                                if($un->member == 0){
                                    ?>
                                    checked="true"
                                    <?php
                                }
                                ?>
                            />否
                        </div>
                        <div class="realname">
                            <p>真实姓名：</p>
                            <input type="text" value="<?php echo $un->realname?>" name="realname"/><span style="color: red">（必填项）</span>
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
                        <div id="birthday_container">
                            <p>生日：</p>
                            <?php
                            if($un->birth){
                                $pieces = explode("-", $un->birth);
                                $month = substr( $pieces[1],1);
                            ?>
                                <select name="year"><option value="<?php echo $pieces[0];?>"><?php echo $pieces[0];?></option></select>
                                <select name="month"><option value="<?php echo $month;?>"><?php echo $month;?>月</option></select>
                                <select name="day"><option value="<?php echo $pieces[2];?>"><?php echo $pieces[2];?></option></select>
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
                            <input type="text" value="<?php echo $un->email;?>" name="email"/>
                        </div>
                        <input type="submit" value="保存修改"/>
                    </div>
                </form>
            </div>
            <div id="change-pwd">
                <h3>修改密码</h3>
                <form action="user/change_password" method="get">
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
            <div id="address">
                <h3>地址list</h3>
                <div class="paycont">
                    <div class="address">
                        <ul>
                            <?php
                            foreach($addres as $address){
                                ?>
                                <li class="user-addresslist ">
                                    <div class="address-left">
                                        <div class="user DefaultAddr">
										<span class="buy-address-detail">
                   							<span class="buy-user"><?php echo $address->con_name?> </span>
											<span class="buy-phone"><?php echo $address->tel?></span>
										</span>
                                        </div>
                                        <div class="default-address DefaultAddr">
                                            <span class="buy-line-title buy-line-title-type">收货地址：</span>
										<span class="buy--address-detail">
											<span class="province"><?php echo $address->prov?></span>
											<span class="city"><?php echo $address->city?></span>
											<span class="dist"><?php echo $address->dist?></span>
											<span class="street">(<?php echo $address->address_des?>)</span>
										</span>
                                        </div>
                                    </div>
                                    <div class="new-addr-btn">
                                        <a href="#" data-address="<?php echo $address->address_id?>" class="edit-address">编辑</a>
                                        <span >|</span>
                                        <a href="user/del_address?addressid=<?php echo $address->address_id?>" class="del-address">删除</a>
                                    </div>
                                </li>
                            <?php
                            }
                            ?>

                        </ul>
                        <h3>添加地址</h3>
                        <form action="javascript:;">
                            <div class="add-address">
                                <div>
                                    <p>收货人姓名：</p>
                                    <input type="text" value="" name="con-name" class="con-name"/>
                                </div>
                                <div>
                                    <p>电话：</p>
                                    <input type="text" value="" name="tel" class="tel"/>
                                </div>
                                <div id="city">
                                    <p>所在地：</p>
                                    <select name="prov" class="prov"></select>
                                    <select name="city" class="city"></select>
                                    <select name="dist" class="dist"></select>
                                </div>
                                <div>
                                    <p>详细地址：</p>
                                    <textarea name="address-des" id="" cols="30" rows="10" placeholder="请输入详细地址..." class="address-des"></textarea>
                                </div>
                                <input type="submit" value="保存修改" class="address-submit"/>
                            </div>
                        </form>
                    </div>
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
                                <a href="#" class="J_MakePoint">
                                    <div class="item-pic">
                                        <img src="images/ls10.jpg" class="itempic J_ItemImg">
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
                                <a href="#" class="J_MakePoint">
                                    <div class="item-pic">
                                        <img src="images/ls10.jpg" class="itempic J_ItemImg">
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
                                <a href="#" class="J_MakePoint">
                                    <div class="item-pic">
                                        <img src="images/ls10.jpg" class="itempic J_ItemImg">
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
                                <a href="#" class="J_MakePoint">
                                    <div class="item-pic">
                                        <img src="images/ls10.jpg" class="itempic J_ItemImg">
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
                                <a href="#" class="J_MakePoint">
                                    <div class="item-pic">
                                        <img src="images/ls10.jpg" class="itempic J_ItemImg">
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
            <div id="collect">
                <h3>我的收藏</h3>
                <div class="row">
                    <div class="col-md-3">
                        <div class="thumbnail">
                            <a href="#">
                                <img src="images/pic1.jpg" alt="零食"/>
                            </a>
                            <div class="food-name">
                                <h4>宝帝奶酪威化饼干350g</h4>
                                <span><strong>￥19.80</strong></span>
                            </div>
                            <div class="food-shop">
                                <a class="btn  btn btn-danger" href="#">加入购物车</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="thumbnail">
                            <a href="#">
                                <img src="images/pic1.jpg" alt="零食"/>
                            </a>
                            <div class="food-name">
                                <h4>宝帝奶酪威化饼干350g</h4>
                <span>
                    <strong>￥19.80</strong>
                </span>
                            </div>
                            <div class="food-shop">
                                <a class="btn  btn btn-danger" href="#">加入购物车</a>
                            </div>

                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="thumbnail">
                            <a href="#">
                                <img src="images/pic1.jpg" alt="零食"/>
                            </a>
                            <div class="food-name">
                                <h4>宝帝奶酪威化饼干350g</h4>
                <span>
                    <strong>￥19.80</strong>
                </span>
                            </div>
                            <div class="food-shop">
                                <a class="btn  btn btn-danger" href="#">加入购物车</a>
                            </div>

                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="thumbnail">
                            <a href="#">
                                <img src="images/pic1.jpg" alt="零食"/>
                            </a>
                            <div class="food-name">
                                <h4>宝帝奶酪威化饼干350g</h4>
                <span>
                    <strong>￥19.80</strong>
                </span>
                            </div>
                            <div class="food-shop">
                                <a class="btn  btn btn-danger" href="#">加入购物车</a>
                            </div>

                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="thumbnail">
                            <a href="#">
                                <img src="images/pic1.jpg" alt="零食"/>
                            </a>
                            <div class="food-name">
                                <h4>宝帝奶酪威化饼干350g</h4>
                <span>
                    <strong>￥19.80</strong>
                </span>
                            </div>
                            <div class="food-shop">
                                <a class="btn  btn btn-danger" href="#">加入购物车</a>
                            </div>

                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="thumbnail">
                            <a href="#">
                                <img src="images/pic1.jpg" alt="零食"/>
                            </a>
                            <div class="food-name">
                                <h4>宝帝奶酪威化饼干350g</h4>
                <span>
                    <strong>￥19.80</strong>
                </span>
                            </div>
                            <div class="food-shop">
                                <a class="btn  btn btn-danger" href="#">加入购物车</a>
                            </div>

                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="thumbnail">
                            <a href="#">
                                <img src="images/pic1.jpg" alt="零食"/>
                            </a>
                            <div class="food-name">
                                <h4>宝帝奶酪威化饼干350g</h4>
                <span>
                    <strong>￥19.80</strong>
                </span>
                            </div>
                            <div class="food-shop">
                                <a class="btn  btn btn-danger" href="#">加入购物车</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <?php include 'footer.php'?>
    <script>
        $(function(){
            //日期年月日三级联动
            $("#birthday_container").birthday();
            //城市三级联动
            $("#city").citySelect();

            //判断单选框是否被选中
            var $infContent = $('#person-information .information-content');

            //这是个错误
//            if($('.open-member input[type=radio]',$infContent).attr('checked')){
//                var $radioid = $('.open-member input[checked=true]',$infContent).attr('id');
//                $(' label[for='+$radioid+']',$infContent).css('background-image','url(images/yesframe.png)');
//                $('.realname',$infContent).css('display','block');
//            }
            if($('.open-member input[checked=true]',$infContent).val()==1){
                $('.realname',$infContent).css('display','block');
            }
            if($('.open-member input[checked=true]',$infContent)){
                var $radioid = $('.open-member input[checked=true]',$infContent).attr('id');
                $(' label[for='+$radioid+']',$infContent).css('background-image','url(images/yesframe.png)');
            }
            if($('#yes-sex input[checked=true]',$infContent)){
                var $sexid = $('#yes-sex input[checked=true]',$infContent).attr('id');
                $(' label[for='+$sexid+']',$infContent).css('background-image','url(images/yesframe.png)');
            }
            //是否开通会员
            $('.open-member input[type=radio]',$infContent).change(function(){
                if($(this).val()=='1'){
                    $('.realname',$infContent).css('display','block');
                }else{
                    $('.realname',$infContent).css('display','none');
                }
            });
           //判断该显示哪个div
            var $url =location.hash;
            if($url){
                $($url).show().siblings('div').hide();
            }else{
                $('#person-information').show().siblings('div').hide();
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
                var $input = $('<input type="text" name="username" />').css({
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
                $.get("user/check_password",{
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
        //添加新地址
            var $address = $('#address .add-address');
            var $conName = $('.con-name',$address);
            var $tel = $('.tel',$address);
            var $prov = $('.prov',$address);
            var $city = $('.city',$address);
            var $dist = $('.dist',$address);
            var $addressDes = $('.address-des',$address);
            var $addressSubmit = $('.address-submit',$address);
            $addressSubmit.on('click',function(){
                $.get('user/add_address',{
                    'con-name':$conName.val(),
                    'tel':$tel.val(),
                    'prov':$prov.val(),
                    'city':$city.val(),
                    'dist':$dist.val(),
                    'address-des':$addressDes.val()
                },function(data){
                    if(data=='success'){
                        window.location="<?php echo site_url();?>/user/information/#address";
                    }else{
                        window.location="<?php echo site_url();?>/user/information/#address";
                    }
                },'text');
            });
            //删除地址
            var $oldAddress = $('#address');
            $('.del-address',$oldAddress).on('click',function(){
                if(confirm('确认删除地址？')==false){
                    return false;
                }
            });
            //点击修改地址 弹出弹出层
            var $mask = $('#mask');
            var $fbg = $('#fbg');
            var $cName = $('.con-name',$mask);
            var $telphone = $('.tel',$mask);
            var $editProv = $('.prov',$mask);
            var $editCity = $('.city',$mask);
            var $editDist = $('.dist',$mask);
            var $editDes = $('.address-des',$mask);
            var addressId;
            $('.edit-address',$oldAddress).on('click',function(){
                addressId = $(this).attr('data-address');
                $.get('user/get_address',{
                    'address-id':addressId
                },function(data){
                    if(data!='fail'){
                        var arr = data.split("&");

                        $mask.show();
                        $fbg.show();
                        $cName.val(arr[0]);
                        $telphone.val(arr[1]);
                        $(".edit-city",$mask).citySelect({
                            prov: arr[2],
                            city: arr[3],
                            dist:arr[4]
                        });
                        $editDes.html(arr[5]);
                    }
                },'text');
                return false
            });
            //关闭弹出层
            $fbg.on('click',function(){
                if(confirm('是否放弃修改')){
                    $(this).hide();
                    $mask.hide();
                }
            });
            //修改地址
            $('.edit-submit',$mask).on('click',function(){
                if(confirm('是否确认修改')){
                    $.get('user/change_address',{
                        'address-id':addressId,
                        'con-name':$cName.val(),
                        'tel':$telphone.val(),
                        'prov':$editProv.val(),
                        'city':$editCity.val(),
                        'dist':$editDist.val(),
                        'address-des':$editDes.val()
                    },function(data){
                        if(date='success'){
                            window.location.reload();
                        }else{
                            confirm('修改失败');
                        }
                    },'text');
                }

            });



            $(".file_upload").change(function() {

                var $file = $(this);
                var fileObj = $file[0];
                var windowURL = window.URL || window.webkitURL;
                var dataURL;
                var $img = $("#preview");

                if(fileObj && fileObj.files && fileObj.files[0]){
                    dataURL = windowURL.createObjectURL(fileObj.files[0]);
                    console.log(dataURL);
                    $img.attr('src',dataURL);
                }else{
                    dataURL = $file.val();
                    var imgObj = document.getElementById("preview");
                    imgObj.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
                    imgObj.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = dataURL;

                }
            });








        });
    </script>
</body>
</html>