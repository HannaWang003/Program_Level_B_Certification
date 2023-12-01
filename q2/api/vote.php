<?php
include_once "../db.php";
// dd($_POST['opt']);
// exit();
$opt = $Que->find($_POST['opt']);
$opt['count'] = $opt['count'] + 1;

$subject = $Que->find($opt['subject_id']);
$subject['count'] = $subject['count'] + 1;

$Que->save($opt);
$Que->save($subject);

header("location:../result.php?id={$subject['id']}");
// header("location:../index.php");