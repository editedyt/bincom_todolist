<?php
spl_autoload_register('autoLoad');

function autoLoad($className)
{
    $path = '../model/';
    $extention = '.php';
    $fullpath = $path . $className . $extention;;

    require_once $fullpath;
}

if(isset($_POST['title'])){
    $querys = new Database();


    $title = $_POST['title'];

    if(empty($title)){
        header("Location: ../index.php?mess=error");
    }else {
        $stmt = "INSERT INTO todos(title) VALUES (?)";
        $querys->write($stmt, [$title]);

        if($res){
            header("Location: ../index.php?mess=success"); 
        }else {
            header("Location: ../index.php");
        }
        $conn = null;
        exit();
    }
}else {
    header("Location: ../index.php?mess=error");
}