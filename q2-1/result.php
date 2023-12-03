<?php
include_once "./api/db.php";
$result =  $Que->find($_GET['id']);
dd($result);

?>