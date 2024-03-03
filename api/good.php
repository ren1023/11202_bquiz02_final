<?php include_once "db.php";

// 前端傳來的值



$news=$News->find($_POST['news']);

if($Log->count(['news'=>$_POST['news'],'acc'=>$_SESSION['user']])>0){
    // 取消讚的資料
    $Log->del(['news'=>$_POST['news'],'acc'=>$_SESSION['user']]);
    $news['good']--;

}else{
    // 存讚的資料
    $Log->save(['news'=>$_POST['news'],'acc'=>$_SESSION['user']]);
    $news['good']++;
}
$News->save($news);