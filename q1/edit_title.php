<?php
include_once "db.php";
// $Title =  dd($_POST);
// exit();
foreach ($_POST['text'] as $key => $id) {
    if (isset($_POST['del'][$key])) {
        $Title->del($key);
    } else {
        $row = $Title->find($key);
        $row['text'] = $_POST['text'][$key];
        $row['sh'] = ($key == $_POST['sh']) ? 1 : 0;
    }
}