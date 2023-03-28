<?php
spl_autoload_register('autoLoad');

function autoLoad($className)
{
    $path = '../model/';
    $extention = '.php';
    $fullpath = $path . $className . $extention;;

    require_once $fullpath;
}

if(isset($_POST['id'])){
    $querys = new Database();

    $id = $_POST['id'];
    print_r($id);

    if(empty($id)){
       echo 0;
    }else {
        $stmt = "DELETE FROM todos WHERE id=$id";
        $res = $querys->read($stmt);

        if($res){
            echo 1;
        }else {
            echo 0;
        }
        $conn = null;
        exit();
    }
}else {
    header("Location: ../index.php?mess=error");
}