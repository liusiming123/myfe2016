<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>添加商品</title>
    <base href="<?php echo site_url(); ?>">
    <link rel="stylesheet" href="css/common.css"/>
    <link rel="stylesheet" href="css/header.css"/>
    <link rel="stylesheet" href="css/footer.css"/>
    <link rel="stylesheet" href="css/add-snack.css"/>

    <script src="javascript/jquery-1.12.4.js"></script>
    <script src="javascript/upload-picture.js"></script>
    <script src="javascript/index.js"></script>
    <script src="javascript/commont.js"></script>
</head>
<body>
<?php include 'header.php'?>
<div id="add-snack">
    <div class="warp">
        <form method="post" action="seller/add_goods" role="form" enctype="multipart/form-data">
            <div class="upload-picture">
                <div id="prvid"><img src="images/upload-picture.png" alt=""/></div>
                <label for="files" class="files">上传商品图片</label>
                <input id="files" type="file" name="userfile" onchange="previewImage(this, 'prvid')">
            </div>
            <div class="snack-content">
                <div class="sn-name">
                    <p>商品名字：</p>
                    &nbsp;&nbsp;<input type="text" name="sn-name"/>
                </div>
                <div class="sn-type">
                    <p>零食类型：</p>
                    &nbsp;&nbsp;<select name="sn-type">
                        <option value="1" selected="selected">饼干糕点</option>
                        <option value="2">蜜饯果干</option>
                        <option value="3">坚果炒货</option>
                        <option value="4">肉类制品</option>
                        <option value="5">膨化食品</option>
                        <option value="6">糖果巧克力</option>
                        <option value="7">饮料/罐头/牛奶</option>
                        <option value="8">特产零食</option>
                    </select>
                </div>
                <div class="sn-import">
                    <p>零食类型：</p>
                    &nbsp;&nbsp;<select name="sn-import">
                        <option value="1">进口零食</option>
                        <option value="0" selected="selected">国产零食</option>
                     </select>
                </div>
                <div class="sn-name">
                    <p>商品价格：</p>
                    <span>$</span><input type="text" name="price"/>
                </div>
                <div class="member_price">
                    <p>会员价格：</p>
                    <span>$</span><input type="text" name="member_price"/>
                </div>
                <div class="sn_describe">
                    <p>商品描述：</p>
                    &nbsp;&nbsp;<textarea name="sn_describe"cols="30" rows="10"></textarea>
                </div>
                <input type="submit" value="保存零食"/>
            </div>

        </form>
    </div>
</div>
<?php include 'footer.php'?>
</body>
</html>