<div id="header">
    <div class="header-box">
        <div class="logo">
            <img src="images/logo.png" alt=""/>
        </div>
        <div class="search">
            <input type="text"placeholder="搜索......" class="search-input"/>
            <div class="search-icon"></div>
        </div>
        <div class="login">
            <?php
                $un = $this->session->userdata('userinfo');
                $status =  $this->session->userdata('status');
                if($un){
                    if($status==1){
            ?>
                        <div class="click-warp">
                            <span class="name"><?php echo $un->real_name?></span><span class="icon">^</span>
                            <ul>
                                <li><a href="seller/index">我的首页</a></li>
                                <li><a href="seller/information/#person-information">个人中心</a></li>
                                <li><a href="seller/information">订单管理</a></li>
                                <li><a href="seller/add_snack">添加商品</a></li>
                                <li><a href="" class="out">注销</a></li>
                            </ul>
                        </div>
            <?php
                }else if($status==0){
            ?>
                        <div class="click-warp">
                            <span class="name"><?php echo $un->name?></span><span class="icon">^</span>
                            <ul>
                                <li><a href="user/information">个人中心</a></li>
                                <li><a href="">购物车</a></li>
                                <li><a href="seller/information/#order">订单管理</a></li>
                                <li><a href="" class="out">注销</a></li>
                            </ul>
                        </div>
            <?php
                    }
            }else{
            ?>
                    <span><a href="user/login">登陆</a></span>/<span><a href="user/register">注册</a></span>
            <?php
                }
            ?>
        </div>
    </div>
</div>
<div id="nav">
    <div class="nav-box">
        <div id="sidebar">
            <span class="">全部商品分类</span>
            <ul class="sidebar-sub">
                <li><a href="">饼干糕点</a></li>
                <li><a href="">蜜饯果干</a></li>
                <li><a href="">坚果炒货</a></li>
                <li><a href="">肉类制品</a></li>
                <li><a href="">膨化食品</a></li>
                <li><a href="">糖果巧克力</a></li>
                <li><a href="">饮料/罐头/牛奶</a></li>
                <li><a href="">特产零食</a></li>
            </ul>
        </div>
        <ul class="nav-sub">
            <?php
            if($un){
                if($status==1) {
            ?>
                    <li><a href="user/index">首页</a></li>
                    <li><a href="user/all_goods">全部零食</a></li>
                    <li><a href="seller/index">我的首页</a></li>
                    <li><a href="user/suggest">联系我们</a></li>
            <?php
            }else{
            ?>
                    <li><a href="user/index">首页</a></li>
                    <li><a href="user/all_goods">全部零食</a></li>
                    <li><a href="user/import">进口零食</a></li>
                    <li><a href="user/register">加盟招商</a></li>
                    <li><a href="user/suggest">联系我们</a></li>
            <?php
                }
            }
            ?>

        </ul>
    </div>
</div>
<script>
    $(function(){
        $('.out').on('click',function(){
            if(confirm('是否退出登录')){
                $.get('user/out',function(){
                    window.location="<?php echo site_url();?>/user/index";
                })
            }

        })
    })
</script>