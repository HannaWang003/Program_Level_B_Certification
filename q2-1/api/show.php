<?php
include_once "db.php";
$show = $Que->find($_GET['show']);
if($show['sh']==1){
    $show['sh']=0;
    $Que->save($show);
}
else{
    $show['sh']=1;
    $Que->save($show);
}
header('location:../admin.php');
?>