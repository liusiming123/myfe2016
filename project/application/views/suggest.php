<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>联系我们</title>
    <base href="<?php echo site_url(); ?>">
    <link rel="stylesheet" href="css/common.css"/>
    <link rel="stylesheet" href="css/header.css"/>
    <link rel="stylesheet" href="css/footer.css"/>
    <link rel="stylesheet" href="css/suggest.css"/>
    <script src="javascript/jquery-1.12.4.js"></script>
    <script src="javascript/index.js"></script>
    <script src="javascript/commont.js"></script>
</head>
<body>
<?php include 'header.php'?>
    <div id="suggest">
        <div class="content">
            <div class="content-title">
                <h1>请留下您的宝贵建议...</h1>
            </div>
            <form action="user/save_suggest" method="get">
                <div class="suggest-type">
                    <p>请选择意见类型：</p>
                    <select name="suggest-type">
                        <option value="网站问题" selected="selected">网站问题</option>
                        <option value="产品问题">产品问题</option>
                        <option value="商家问题">商家问题</option>
                        <option value="售后问题">售后问题</option>
                    </select>
                </div>
                <div class="suggest-description">
                    <p>问题描述：</p>
                    <textarea name="suggest-description" id="" cols="30" rows="10" placeholder="在此描述您的意见具体内容..."></textarea>
                </div>
                <input type="submit" value="提交"/>
            </form>

        </div>
    </div>
<?php include 'footer.php'?>
<script>
    $('#nav .nav-sub li').eq(3).addClass('bg')
</script>

</body>
</html>