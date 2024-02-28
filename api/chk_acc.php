<?php include_once "db.php";
$res=$User->count(['acc'=>$_POST['acc']]);
// echo "<br>"; debug完，要註解，不然會影響運作
if($res > 0){
    echo 1;
}else{
    echo 0;
}