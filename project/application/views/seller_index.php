<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>
        <?php
        $un = $this->session->userdata('userinfo');
        if($un){
           echo $un->sel_name;
        }else{
            echo '';
        }
        ?>
        店铺</title>
    <base href="<?php echo site_url(); ?>">
    <link rel="stylesheet" href="css/bootstrap.min.css"/>

    <link rel="stylesheet" href="css/common.css"/>
    <link rel="stylesheet" href="css/header.css"/>
    <link rel="stylesheet" href="css/footer.css"/>
    <link rel="stylesheet" href="css/seller-Index.css"/>

    <script src="javascript/jquery-1.12.4.js"></script>
    <script src="javascript/index.js"></script>
    <script src="javascript/commont.js"></script>
</head>
<body>
<?php include 'header.php'?>
<div id="seller-snack">
    <div class="row">
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
                        <span><strong>会员价￥<?php echo $snack->member_price?></strong></span>
                        <span>￥<?php echo $snack->price?></span>
                    </div>
                    <div class="food-shop">
                        <a class="btn btn-danger" href="#">加入购物车</a>
                        <a class="btn btn-danger collect" href="#">收藏</a>
                    </div>
                </div>
            </div>


    <?php
    }
    ?>
</div>
</div>

<?php include 'footer.php'?>
<script>
    $('#nav .nav-sub li').eq(2).addClass('bg')
</script>
</body>
</html>