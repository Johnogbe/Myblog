<?php require_once('../includes/header1.php');
        require_once '../config/config.php';
        // check for submit
        // get data
        // write query 
        // execute and fetch
        // row count
        // pass word verify and redirect
        // if(isset($_SESSION['username'])){
        //   header('location:../index.php');
        // }
        if (isset($_POST['forbtn'])) {
          $email = $_POST['forget'];
          echo $email;
          $subject = 'update password';
          // $arr = [];
          // $out;
          // $token = ['1','2','3','4','5','6','7','8','9','10'];
          // for ($i=0; $i < 6; $i++) { 
          //   global $arr;
          //   for ($i=0; $i < 1; $i++) { 
          //     $ran = rand(0,9);
          //     $unit = $token[$ran];
          //     global $out;
          //     $out = $unit . $unit;
          //   }
            
          //   ;
          //   //echo $unit;
            
          //   //array_push($arr,$unit);
            
          // };
          // echo $out;
          // foreach ($arr as $ar) {
          //   global $message;
          //   //echo $ar;
          //   $message += $ar; 
          // };
          // echo '<br>'. $message;
                
          // if (mail($email,$subject,$message,$header)) {
          //   # code...
          // }
        }
        if(isset($_POST['email'])){
          sleep(1);
            $email =$_POST['email'];
            $password =$_POST['password'];
            echo 'well done';
            if (empty($email)||empty($password)) {
                echo "<div class='alert alert-danger text-center' role='alert'> please type in something</div>";
            }else{
              $pass =$_POST['password'];
              $query = "select * from users where email = ?";
              $stmt = $conn->prepare($query);
              $stmt->execute([$email]);
              $result = $stmt->fetch(PDO::FETCH_ASSOC);
              $row = $stmt->rowCount();
              //var_dump($result);
              if ($row>0) {
                //echo $result['mypassword'];
                if (password_verify($pass, $result['mypassword'])) {
                  
                 $_SESSION['username']= $result['username'];
                 $_SESSION['user_id']= $result['id'];
                  header('location:../index.php');
                }else{
                  echo "<div class='alert alert-danger text-center' role='alert'> your password is not correct </div>";

                } 
                
              }else{
                echo "<div class='alert alert-danger text-center' role='alert'>Account not available!. Check email spelling or register an account</div>";

              }
            };
        }
        
       
        ?>
               <form method="POST" action="login1.php" id='form' onsubmit='return false'>
                  <!-- Email input -->
                  <div class="form-outline mb-4" id='email'>
                    <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />
                    
                   
                  </div>

                  
                  <!-- Password input -->
                  <div class="form-outline mb-4" style='display:flex;'>
                    <input type="password" name="password" id="form2Example2"placeholder="Password" class="form-control in" />
                <i class='fas fa-eye' style='color:grey;margin-left:-30px;margin-top:10px' onclick=''></i>

                    
                  </div>



                  <!-- Submit button -->
                  <button name="submit" class="btn btn-primary  mb-4 text-center" id='btn' >submit</button>
                  <!-- forgot password -->
                  <button onsubmit='return FALSE' name="forgot" class="btn btn-danger  mb-4 text-center float-end" id='btn2' >forgot password</button>
                  <div id="div"></div>

                  <!-- Register buttons -->
                  <div class="text-center">
                    <p>a new member? Create an acount<a href="register.php"> Register</a></p>
                    

                   
                  </div>
                  <ul class="navbar-nav ms-auto py-4 py-lg-0">
                    
                    <?php
                   ?>
                        
          
                </form>
        <?php
        require_once('../includes/footer1.php')
        ?>
       