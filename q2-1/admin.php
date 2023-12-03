<?php
include_once "./api/db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>問卷管理</title>
    <link rel="stylesheet" href="../css/css.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
    <h1 class="text-center">問卷管理</h1>
    <form action="./api/add_que.php" method="post">
    <fieldset class="container bg-secondary bg-opacity-10">
        <legend>新增問卷</legend>

        <?php
if(isset($_GET['erro'])){
    ?>
            <div class="alert alert-danger" role="alert">
    <?=$_GET['erro'];?>
</div>
    <?php
}
            ?>
</div>
        <div class="row m-2 p-2 bg-black text-light">
            <div class="col-3 text-warning">問卷名稱</div>
            <input class="w-50" type="text" name="subject" id="">
        </div>
        <div class="row bg-dark bg-opacity-25 p-2 m-2">
            <div class="mt-1">
                <label class="p-2">選項</label>
                <input class="mx-2 w-75" type="text" name="text[]" id="">
            </div>
            <button type="button" id="option" class="btn btn-primary col-2 offset-10 p-2 my-1" onclick="more()">更多</button>
        </div>
        <div class="m-2">
            <input class="btn btn-dark text-warning" type="submit" value="新增">
            <input class="btn btn-light text-secondary" type="reset" value="清空">
        </div>
    </fieldset>
    </form>
    <div class="container mt-3">
        <h3>問卷列表</h3>
        <table class="table">
            <tr>
                <th>編號</th>
                <th>主題內容</th>
                <th>操作</th>
            </tr>
            <?php
$rows = $Que->all(['subject_id'=>0]);
// dd($rows);
foreach($rows as $key => $row){
// dd($key);
// echo "<hr>";
// dd($row);
// echo "<hr>";
// }
// exit();
?>
            <tr>
                <td><?=$key+1;?></td>
                <td><?=$row['text'];?></td>
                <td>
            <a class="btn <?=($row['sh']==1)?'btn-info':'btn-outline-info'?>" href="./api/show.php?show=<?=$row['id']?>"><?=($row['sh']==1)?'顯示':'隱藏'?></a>        
            <a class="btn btn-success" >編輯</a>        
            <a class="btn btn-danger" href="./api/del.php?id=<?=$row['id']?>">刪除</a>        
            </td>
            </tr>
<?php
}
?>
        </table>
    </div>
    


<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/js.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>
<script>
    function more(){
        let opt = `<div class="mt-1">
                <label class="p-2">選項</label>
                <input class="mx-2 w-75" type="text" name="text[]" id="">
            </div>`
    $("#option").before(opt);
    }
</script>