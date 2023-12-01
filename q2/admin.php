<?php
include_once "db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>問卷管理後台</title>
    <link rel="stylesheet" href="../css/css.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>

<body>
    <header class="container p-5">
        <h1 class="text-center">問卷管理</h1>
    </header>
    <main class="container p-3">
        <fieldset>
            <legend>新增問卷</legend>
            <form action="./api/add_que.php" method="post">
                <div class="d-flex">
                    <div class="col-3 bg-light p-2">問卷名稱</div>
                    <div class="col-6 p-2">
                        <input type="text" name="subject" id="">
                    </div>
                </div>
                <div class="bg-secondary bg-opacity-10">
                    <div class="p-2" id="option">
                        <label for="">選項</label>
                        <input type="text" name="opt[]">
                        <input type="button" value="更多" onclick="more()">
                    </div>
                </div>
                <div>
                    <input type="submit" value="新增">
                    <input type="reset" value="清空">
                </div>
            </form>
        </fieldset>
        <fieldest>
            <legend>問卷列表</legend>
            <table class="table">
                <tr>
                    <td>編號</td>
                    <td>主題內容</td>
                    <td>操作</td>
                </tr>
                <?php
                $ques = $Que->all(['subject_id' => 0]);
                foreach ($ques as $idx => $que) {
                ?>
                <tr>
                    <td><?= $idx + 1; ?></td>
                    <td><?= $que['text']; ?></td>
                    <td>
                        <a href="./api/show.php?id=<?= $que['id'] ?>"
                            class="btn <?= ($que['sh'] == 1) ?'btn-info':'btn-secondary'?>">
                            <?= ($que['sh'] == 1) ? '顯示' : '隱藏'; ?>
                        </a>
                        <button class="btn btn-warning">編輯</button>
                        <a href="./api/del.php?id=<?= $que['id'] ?>">
                            <button class="btn btn-light text-secondary">刪除</button>
                        </a>
                    </td>
                </tr>

                <?php
                }
                ?>
            </table>
        </fieldest>
        <table class="table">
    </main>

    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/bootstrap.js"></script>
</body>

</html>

<script>
function more() {
    let opt = `<div class="p-2">
                        <label for="">選項</label>
                        <input type="text" name="opt[]">
                    </div>`
    $("#option").before(opt)
}
</script>