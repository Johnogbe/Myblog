<?php require_once "../../config/config.php"?>
<?php 
 if (isset($_GET['po_id'])) {
     
     $id = $_GET['po_id'];
    

        
        $delete = $conn->prepare("delete from post where id = :id");
        $delete->execute([
            ':id'=>$id
        ]);
        
        
        
       header('location:http://localhost/myblog/admin-panel/posts-admins/show-posts.php');
     

 }else{
    header('location:http://localhost/myblog/404.php');

 }


?>
