<?php
include_once "./api/db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>問卷調查</title>
    <link rel="stylesheet" href="../css/css.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
    <h1 class="text-center">問卷調查</h1>
    <fieldset class="container">
        <legend>目前位置:首頁>問卷調查</legend>
        <table class="table">
            <tr>
                <td>編號</td>
                <td>問卷題目</td>
                <td>投票總數</td>
                <td>結果</td>
                <td>狀態</td>
            </tr>
            <?php
$rows = $Que->all(['subject_id'=>'0','sh'=>'1']);
// dd($rows);
// exit();
foreach($rows as $idx => $que){
            ?>
            <tr>
                <td><?=$idx+1?></td>
                <td><?=$que['text']?></td>
                <td><?=$que['count']?></td>
                <td>
                    <a class="btn btn-info" href="./result.php?id=<?=$que['id']?>">投票結果</a>
                </td>
                <td>
                    <a class="btn btn-warning" href="./vote.php?id=<?=$que['id']?>">我要投票</a>
                </td>
            </tr>
            <?php
}
            ?>
        </table>
    </fieldset>
    
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/js.js"></script>
    <script src="../js/bootstrap.js"></script>
</body>
</html>