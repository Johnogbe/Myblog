<?php require "../includes/header1.php"?>
<div class='alert alert-danger text-center' role='alert' id='alert'style="display:none"></div>

            <form method="POST" action="register.php" onsubmit='return false'>
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" autocomplete='off'/>
               
              </div>

              <div class="form-outline mb-4">
                <input type="" name="username" id="form2Example0" class="form-control" placeholder="Username" autocomplete='off'/>
               
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4" style='display:flex;'>
                <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control in" style=''autocomplete='off'/>
                <i class='fas fa-eye' style='color:grey;margin-left:-30px;margin-top:10px' onclick=''></i>
              </div>



              <!-- Submit button -->
              <button type="submit" name="submit" id='btn'class="btn btn-primary  mb-4 text-center"onclick='login(event,"register")'>Register</button>

              <!-- Register buttons -->
              <div class="text-center">
                <p>Aleardy a member? <a href="login.php">Login</a></p>
                

               
              </div>
            </form>

<?php require "../includes/footer.php";?>

