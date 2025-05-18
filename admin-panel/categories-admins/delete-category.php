<?php require_once "../../config/config.php"?>
<?php 
 if (isset($_GET['de_id'])) {
     
   
    $id =  $_GET['de_id'];

        
        $delete = $conn->prepare("delete from category where id = :id");
        $delete->execute([
            ':id'=>$id
        ]);
        
        
        
       header('location:http://localhost/myblog/admin-panel/categories-admins/show-categories.php');
     

 }else{
    header('location:http://localhost/myblog/404.php');

 }


?>
