<?php include_once "db.php";
$res=$User->count($_POST);
// echo "<br>"; debug完，要註解，不然會影響運作
if($res){
    $_SESSION['user']=$_POST['acc'];
}
echo "$res";