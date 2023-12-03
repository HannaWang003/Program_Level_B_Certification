<?php
include_once "./api/db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>問卷投票</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/css.css">
</head>
<body>
    <header class="p-5">
        <h1 class="text-center">問卷投票</h1>
    </header>
    <main class="container">
        <form action="./api/vote.php" method="post">
        <?php
        $subject = $Que->find($_GET['id']);
        // dd($subject);
        // exit();
        ?>
        <h2 class="text-center"><?=$subject['text']?></h2>
        <ul class="list-group col-6 mx-auto">
            <?php
$opts = $Que->all(['subject_id'=>$_GET['id']]);
    foreach($opts as $idx => $opt){
            ?>
            <li class="list-group-item list-group-item-action">
                <input type="radio" name="opt" value="<?=$opt['id']?>">
                <?=$opt['text']?>
            </li>
            <?php
    }            
    ?>
        </ul>
        <input class="btn btn-primary d-block mx-auto my-5" type="submit" value="我要投票">
        </form>
    </main>
    


<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/js.js"></script>
<script src="../js/bootstrap.js"></script>
</body>
</html>