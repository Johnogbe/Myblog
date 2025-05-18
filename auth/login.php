<?php require_once('../includes/header.php');?>
<div class='alert alert-danger text-center' role='alert' id='alert'style="display:none"></div>
               <form method="POST" action="forget.php" id='form' onsubmit="return false">
                <!-- Submit server verification-->
                 
                  <!-- Email input -->
                  <div class="form-outline mb-4" id='email'>
                    <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />
                    
                   
                  </div>

                  
                  <!-- Password input -->
                  <div class="form-outline mb-4" style='display:flex;'>
                    <input type="password" name="password" id="form2Example2"placeholder="Password" class="form-control in" />
                <i class='fas fa-eye' style='color:grey;margin-left:-30px;margin-top:10px'></i>

                    
                  </div>



                  <!-- Submit button -->
                  <button name="submit" class="btn btn-primary  mb-4 text-center" id='btn' onclick="login(event,'login')">submit</button>
                  <!-- forgot password -->
                  <button type ='button' name="forgot" class="btn btn-danger  mb-4 text-center float-end" id='btn2'>forgot password</button>
                  <div id="div">
                    
                  </div>

                  <!-- Register buttons -->
                  <div class="text-center">
                    <p>a new member? Create an acount<a href="register.php"> Register</a></p>
                    

                   
                  </div>
                  <ul class="navbar-nav ms-auto py-4 py-lg-0">
                    
                    <?php
                   ?>
                        
          
                </form>
        <?php
        require_once('../includes/footer.php')
        ?>
       