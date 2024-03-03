<?php include_once "db.php";
foreach($_POST['del'] as $id){
    $User->del($id);
}

to("./back.php?do=admin");