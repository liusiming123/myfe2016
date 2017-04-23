<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>首页</title>
    <base href="<?php echo site_url(); ?>">
    <link rel="stylesheet" href="css/common.css"/>
    <link rel="stylesheet" href="css/header.css"/>
    <link rel="stylesheet" href="css/footer.css"/>
    <link rel="stylesheet" href="css/index.css"/>
    <script src="javascript/jquery-1.12.4.js"></script>
    <script src="javascript/index.js"></script>
</head>
<body>
<?php include 'header.php'?>
    <div id="bner">
        <div class="bner-box">
            <div class="bner-warp">
                <a href="" class="img-block"><img src="images/1.jpg" alt=""/></a>
                <a href=""><img src="images/2.jpg" alt=""/></a>
                <a href=""><img src="images/3.jpg" alt=""/></a>
                <a href=""><img src="images/4.jpg" alt=""/></a>
            </div>
            <div class="bner-tab">
                <span><img src="images/1.jpg" alt="" class="img-opacity"/></span>
                <span><img src="images/2.jpg" alt=""/></span>
                <span><img src="images/3.jpg" alt=""/></span>
                <span><img src="images/4.jpg" alt=""/></span>
            </div>
        </div>
    </div>
    <div id="content">
        <div class="new-snacks">
            <div class="snack-title">
                <span class="snack-title-l">新品推荐</span>
            </div>
            <ul class="snacks">
                <li>
                    <a href="">
                        <img src="images/ls1.jpg" alt=""/>
                        <div class="snack-details">
                            <p class="snack-name">开心果</p>
                            <p class="snack-introduce">精选优质开心果，营养丰富</p>
                            <p class="snack-price">￥25.00</p>
                        </div>
                        <button class="add-cart">加入购物车</button>
                        <button class="collect">收藏</button>
                    </a>
                </li>

            </ul>
        </div>
    </div>
<?php include 'footer.php'?>
<script>
    $('#nav .nav-sub li').eq(0).addClass('bg')
</script>
</body>
</html>