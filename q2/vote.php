<?php
include_once "db.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>問卷投票</title>
    <link rel="stylesheet" href="../css/css.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>

<body>
    <?php
    if (isset($_GET['id'])) {
        $subject = $Que->find($_GET['id']);
        $opts = $Que->all(['subject_id' => $_GET['id']]);
        // dd($opts);
        // exit()
    ?>
        <header class="container p-5">
            <h1 class="text-center">問卷調查</h1>
        </header>
        <main class="container">
            <fieldset class="container">
                <legend>
                    目前位置:首頁>問卷調查><?= $subject['text'] ?>
                </legend>
            </fieldset>
            <form action="./api/vote.php" meth="post">
                <ul class="list-group col-6 mx-auto">
                    <?php
                    foreach ($opts as $idx =>  $opt) {
                    ?>
                        <li class="list-group-item list-group-item-action">
                            <input type="radio" name="<?= $opt['id'] ?>" id="">
                            <?= $opt['text'] ?>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                <input type="submit" value="我要投票" class="btn btn-primary d-block mx-auto my-5">
            </form>
        </main>
    <?php
    }

    ?>
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/bootstrap.js"></script>
</body>

</html>