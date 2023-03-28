<?php
$post = json_decode(file_get_contents("php://input"));
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
    print_r($_POST);
    if(empty($id)){
       echo 'error';
    }else {
        $stmt = "SELECT id, checked FROM todos WHERE id= $id";
        $que = $querys->read($stmt);
        $que->execute();

        $todo = $que->fetch();
        $uId = $todo['id'];
        $checked = $todo['checked'];
        
        $uChecked = $checked ? 0 : 1;

        $newStmt = "UPDATE todos SET checked=$uChecked WHERE id=$uId";
        $res = $querys->read($newStmt);
        if($res){
            echo $checked;
        }else {
            echo "error";
        }
        $conn = null;
        exit();
    }
}else {
    header("Location: ../index.php?mess=error");
}