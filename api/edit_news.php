<?php include_once "db.php";
// dd($_POST);

if(isset($_POST['id'])){

    foreach($_POST['id']as $id){
        if(isset($_POST['del']) && in_array($id,$_POST['del'])){
            $News->del($id);
        }else{
            $new=$News->find($id);
            // dd($new);
            // exit();
            $new['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
            $News->save($new);
        }
        
    }
}
to("../back.php?do=news");