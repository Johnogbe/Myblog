<?php 

require_once "../includes/header.php";
require_once "../config/config.php";?>
<?php 
if(isset($_GET['update_id'])){
    $id= $_GET['update_id'];
    $select = $conn->query("select * from post where id = $id");
    $select->execute();
    $result = $select->fetch(PDO::FETCH_OBJ);
  if ($_SESSION['username'] != $result->username) {
    header('location:../index.php');

  }
    if (isset($_POST['submit'])) {
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $body = $_POST['body'];
       $img = $_FILES['image']['name'];
       $dir = '../images/' .basename($img);
       

          
        if (empty($title)||empty($subtitle)||empty($body)||empty($img)) {
          echo "<div class='alert alert-danger text-center' role='alert'> please type in something</div>";
        }else{
     unlink("../images/" .$result->img ."");
         
             $queryinsert = $conn->prepare("update post set title = :title,subtitle = :subtitle,body = :body,img = :img where id = $id");
             $queryinsert->execute([
                 ':title' => $title,
                 ':subtitle'=>$subtitle,
                 ':body'=>$body,
                 ':img'=>$img
                 
             ]);
             if(move_uploaded_file($_FILES['image']['tmp_name'],$dir)){
                header('location:../index.php');
              }
            
        }   
    } 
         
}else{
  header('location:http://localhost/myblog/404.php');

}

?>

                <!-- Main Content-->
     

            <form method="POST" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="text" name="title" value="<?php echo $result->title?>" id="form2Example1" class="form-control" placeholder="title" />
               
              </div>

              <div class="form-outline mb-4">
                <input type="text" name="subtitle" id="form2Example1" value="<?php echo $result->subtitle?>"  class="form-control" placeholder="subtitle" />
            </div>

            <div class="form-outline mb-4">
                <textarea type="text" name="body" id="form2Example1" class="form-control" placeholder="body" rows="8"><?php echo $result->body?> </textarea>
            </div>

              <?php echo "<img src= '../images/".$result->img."' width='450px' height='180px'> "?>
             <div class="form-outline mb-4">
                <input type="file" name="image" id="form2Example1" class="form-control" placeholder="image" />
            </div>


              <!-- Submit button -->
              <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Update</button>

          
            </form>


            <?php 

require_once "../includes/footer.php";
?>
