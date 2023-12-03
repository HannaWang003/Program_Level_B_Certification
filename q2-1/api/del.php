<?php
include_once "./db.php";
if(isset($_GET['id'])){
    $Que->del($_GET['id']);
    $Que->del(['subject_id'=>$_GET['id']]);
}
else{
    echo "未提供正確參數";
}
header("location:../admin.php");
?>