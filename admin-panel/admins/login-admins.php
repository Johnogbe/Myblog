<?php require_once "../layouts/header.php"?>
<?php require_once "../../config/config.php"?>
<?php 
if (isset($_SESSION['adminname'])){
  header('location:http://localhost/myblog/admin-panel/index.php');
}
  if(isset($_POST['submit'])){
    $email =$_POST['email'];
    $password =$_POST['password'];

    if (empty($email)||empty($password)) {
        echo "<div class='alert alert-danger text-center' role='alert'> please type in something</div>";
    }else{
      $pass =$_POST['password'];
      $query = "select * from admin where email = ?";
      $stmt = $conn->prepare($query);
      $stmt->execute([$email]);
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      $row = $stmt->rowCount();
      //var_dump($result);
      if ($row>0) {
        //echo $result['mypassword'];
        if (password_verify($pass, $result['mypassword'])) {
          
         $_SESSION['adminname']= $result['adminname'];
         $_SESSION['admin_id']= $result['id'];
         
          header('location:../index.php');
        }else{
          echo "<div class='alert alert-danger text-center' role='alert'> your password is wrong</div>";

        } 
        
      }else{
        echo "<div class='alert alert-danger text-center' role='alert'>wrong email or password</div>";

      }
    };
}
?>
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mt-5">Login</h5>
              <form method="POST" class="p-auto" action="login-admins.php">
                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />
                   
                  </div>

                  
                  <!-- Password input -->
                  <div class="form-outline mb-4">
                    <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" />
                    
                  </div>



                  <!-- Submit button -->
                  <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Login</button>

                 
                </form>

            </div>
       </div>
     </div>

    </div>
    
    <?php require_once "../layouts/header.php"?>
