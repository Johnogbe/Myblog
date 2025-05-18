<?php
 require_once "../../config/config.php";

 if (!isset($_SESSION['adminname'])) {
    header('location:http://localhost/myblog/admin-panel/admins/login-admins.php');

}
if (isset($_GET['status']) && isset($_GET['id'])) {
    
    $id = $_GET['id'];
    $status = $_GET['status'];

    if ($status == 0) {
       $update =  $conn->query("update comment set comment_status = 1 where id = $id");
       $update->execute();

    }else{
        $update =  $conn->query("update comment set comment_status = 0 where id = $id");
       $update->execute();
    }
    header('location: http://localhost/myblog/admin-panel/comments/comments.php');
}else{
    header('location:http://localhost/myblog/404.php');
}