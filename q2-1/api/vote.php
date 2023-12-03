<?php
include_once "db.php";
$opt = $Que->find($_POST['opt']);
$opt['count'] += 1;
$Que->save($opt);

$subject = $Que->find($opt['subject_id']);
$subject['count'] +=1;
$Que->save($subject);
header("location:../result.php?id={$subject['id']}");
?>