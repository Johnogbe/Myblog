<?php require_once "../../config/config.php"?>
<?php 
    if (!isset($_SESSION['adminname'])) {
        header('location:http://localhost/myblog/admin-panel/admins/login-admins.php');
    
    }
    if(isset($_GET['status'])&& isset($_GET['id'])) {
       $status = $_GET['status']; 
       $id = $_GET['id']; 

       if ($status ==0) {
           $update = $conn->query("update post set status = 1 where id = $id");
           $update->execute();

       }else{
        $update = $conn->query("update post set status = 0 where id = $id");
        $update->execute();
       }
       header('location:http://localhost/myblog/admin-panel/posts-admins/show-posts.php');

    }else{
    header('location:http://localhost/myblog/404.php');

    }

?>