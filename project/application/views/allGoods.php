<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>全部商品</title>
    <base href="<?php echo site_url(); ?>">
    <link rel="stylesheet" href="css/common.css"/>
    <link rel="stylesheet" href="css/header.css"/>
    <link rel="stylesheet" href="css/footer.css"/>
    <link rel="stylesheet" href="css/index.css"/>
    <script src="javascript/jquery-1.12.4.js"></script>
    <script src="javascript/index.js"></script>
    <script src="javascript/commont.js"></script>
</head>
<body>
<?php include 'header.php'?>
<div id="content">
    <div class="new-snacks">
        <ul class="snacks">
            <?php
            foreach($snacks as $snack){
            ?>
                <li>
                    <a href="">
                        <img src="<?php echo $snack->photo?>" alt=""/>
                        <div class="snack-details">
                            <p class="snack-name"><?php echo $snack->sn_name?></p>
                            <p class="snack-introduce" style="line-height: 13px;margin: 5px 0"><?php echo $snack->sn_describe?></p>
                            <span class="snack-price">￥25.00</span><span>23</span>
                        </div>
                        <button class="add-cart">加入购物车</button>
                        <button class="collect">收藏</button>
                    </a>
                </li>
            <?php
            }
            ?>

        </ul>
    </div>
</div>
<?php include 'footer.php'?>
<script>
    $('#nav .nav-sub li').eq(1).addClass('bg')
</script>
</body>
</html>