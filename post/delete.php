<?php require_once '../config/config.php'?>
<?php require_once '../includes/navbar.php'?>

<?php 
 if (isset($_GET['del'])) {
     
     $id = $_GET['del'];
     $select =$conn->query("select * from post where id =$id");
     $select->execute();
     $result = $select->fetch(PDO::FETCH_OBJ);
     
     if($_SESSION['username'] !== $result->username){
     header('location:http://localhost/myblog/index.php');

     }else{

        unlink("../images/" .$result->img ."");
        $delete = $conn->prepare("delete from post where id = :id");
        $delete->execute([
            ':id'=>$id
        ]);
        
        
        
       header('location:http://localhost/myblog/index.php');
     }

 }else{
    header('location:http://localhost/myblog/404.php');

 }


?>