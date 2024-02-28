<?php include_once "db.php";
$res=$User->find(['email'=>$_POST['email']]);
if($res){
    echo "您的密碼是：".$res['pw'];
}else{
    echo "查無此mail";
}