<?php 

require_once "../includes/header.php";
require_once "../config/config.php";?>
<?php 
if(isset($_GET['prof_id'])){
    $id= $_GET['prof_id'];
    $select = $conn->query("select * from users where id = $id");
    $select->execute();
    $result = $select->fetch(PDO::FETCH_OBJ);
  if ($_SESSION['username'] != $result->username) {
    header('location:../index.php');

  }
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $username=  $_POST['username'];
        
       

          
        if (empty($email)||empty($username)) {
          echo "<div class='alert alert-danger text-center' role='alert'> please fill in all feilds</div>";
          ;
        }else{
     
         
             $queryinsert = $conn->prepare("update users set email = :email,username = :username where id = $id");
             $queryinsert->execute([
                 ':email' => $email,
                 ':username'=>$username,
                 
                 
             ]);
             $_SESSION['username'] = $username;
                header('location:../index.php');
             
            
        }   
    }      
}else{
  header('location:http://localhost/myblog/404.php');

}

?>

                <!-- Main Content-->
     

            <form method="POST" action="profile.php?prof_id=<?php echo $id?>" enctype="multipart/form-data">
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="text" name="email" value="<?php echo $result->email?>" id="form2Example1" class="form-control" placeholder="title" />
               
              </div>

              <div class="form-outline mb-4">
                <input type="text" name="username" id="form2Example1" value="<?php echo $result->username?>"  class="form-control" placeholder="subtitle" />
            </div>




              <!-- Submit button -->
              <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Update</button>

          
            </form>


            <?php 

require_once "../includes/footer.php";
?>
