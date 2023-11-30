<?php
include_once "db.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>題組一</title>
    <link rel="stylesheet" href="../css/bootstrap.css" />
    <link rel="stylesheet" href="../css/css.css">
</head>

<body>
    <!-- modal -->
    <div id="cover" style="display:none; ">
        <div id="coverr">
            <a style="position:absolute; right:3px; top:4px; cursor:pointer; z-index:9999;" onclick="cl('#cover')">X</a>
            <div id="cvr" style="position:absolute; width:99%; height:100%; margin:auto; z-index:9898;"></div>
        </div>
    </div>
    <!-- modal_end -->
    <header class="container">
        <img src="" alt="">
    </header>
    <main class="container">
        <h3 class="text-center">網站標題管理</h3>
        <form action="edit_title.php" method="post">
            <table class="table table-bordered text-center">
                <tr>
                    <td>網站標題</td>
                    <td>替代文字</td>
                    <td>顯示</td>
                    <td>刪除</td>
                    <td></td>
                </tr>
                <?php
                $rows = $Title->all();
                foreach ($rows as $row) {
                ?>
                <tr>
                    <td><img src="./img/<?= $row['img']; ?>" alt="" style="width:300px;height:30px"></td>
                    <td><input type="text" name="text[]" id="" value="<?= $row['text']; ?>" style="width:90%"></td>
                    <td><input type="radio" name="sh" id="" value="<?= $row['id'] ?>"></td>
                    <td><input type="checkbox" name="del[]" id="" value="<?= $row['id'] ?>"></td>
                    <td><input class="btn btn-info" type="button" value="更新圖片"></td>
                </tr>
                <?php
                }
                ?>
            </table>
            <div class="d-flex justify-content-between">
                <div><input class="btn btn-secondary" type="button" onclick="op('#cover','#cvr','title.php')"
                        value="新增網站標題圖片">
                </div>
                <div><input class="btn btn-secondary me-1" type="submit" value="修改確定"><input class="btn btn-secondary"
                        type="reset" value="重置"></div>
                <div></div>
            </div>
            <input type="hidden" name="id" value=<?= $row['id'] ?>>
        </form>
    </main>
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/js.js"></script>
    <script src="../js/bootstrap.js"></script>
</body>

</html>