<?php
include_once('../api/db.php');
// dd($_POST);
// exit();
if(empty($_POST['subject'])){
    header("location:../admin.php?erro=未提供問卷主題");
}
else{
$add['text'] = $_POST['subject'];
$add['count'] = 0;
$add['subject_id'] = 0;
$add['sh'] = 0;
$Que->save($add);
$subject_id = $Que->find(['text'=>$_POST['subject']])['id'];
foreach($_POST['text'] as $opt){
    $add=[];
    if(!empty($opt)){
    $add['text'] = $opt;
    $add['count'] = 0;
    $add['subject_id'] = $subject_id;
    $add['sh'] = 0;
    $Que->save($add);
    }
    
}

header("location:../admin.php");
}
?>