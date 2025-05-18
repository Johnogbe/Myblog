<?php 
require_once('../layouts/header.php');
if (!isset($_SESSION['adminname'])) {
  header('location:http://localhost/myblog/admin-panel/admins/login-admins.php');

}
        require_once '../../config/config.php';
        if (isset($_POST['submit'])){
          $adminname = $_POST['adminname'];
          $email = $_POST['email'];
          $pass = $_POST['password'];
          if (empty($adminname)||empty($email)||empty($pass)) {
            echo "<div class='alert alert-danger text-center' role='alert'> please type in something</div>";
        
         }else{
           $password = password_hash($pass,PASSWORD_DEFAULT);
           echo $password;
         $query = "insert into admin (email,adminname,mypassword)values(?,?,?);";
         $stmt = $conn->prepare($query);
         $stmt->execute([$email,$adminname,$password]);
         header('location:http://localhost/myblog/admin-panel/index.php');
         };
        }
  ?>  
       <div class="row"> 
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Admins</h5>
          <form method="POST" action="create-admins.php" >
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="email" name="email" id="form2Example1" class="form-control" placeholder="email" />
                 
                </div>

                <div class="form-outline mb-4">
                  <input type="text" name="adminname" id="form2Example1" class="form-control" placeholder="username" />
                </div>
                <div class="form-outline mb-4">
                  <input type="password" name="password" id="form2Example1" class="form-control" placeholder="password" />
                </div>

               
            
                
              


                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>
      <?php 
      require_once('../layouts/header.php');
?>