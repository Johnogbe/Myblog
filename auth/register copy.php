
<?php
require "../includes/header1.php"?>
<?php
require_once '../config/config.php';
if (isset($_POST['submit'])){
  $username = $_POST['username'];
  $email = $_POST['email'];
  $pass = $_POST['password'];
  if (empty($username)||empty($email)||empty($pass)) {
    echo "<div class='alert alert-danger text-center' role='alert'> please type in something</div>";

 }else{

  $query = "select * from users where email = '$email' or username = '$username';";
$select = $conn->prepare($query);
$select->execute();
$result = $select->fetchAll(PDO::FETCH_ASSOC);
if ($select->rowCount() > 0) {
  echo'username unavailable';
}else{
    $password = password_hash($pass,PASSWORD_DEFAULT);
    $query = "insert into users (email,username,mypassword)values(?,?,?);";
    $stmt = $conn->prepare($query);
    $stmt->execute([$email,$username,$password]);
   
       
       $message = $username . ',You just created an account with us🎉🎉';
       $subject = 'Account creation';
       $header = "From: $email";
       $to = $email;
   try {
     if (mail($to,$subject,$message,$header)) {
   }
   } catch (\Throwable $th) {
     
   }
 header('location:login.php');
   
  }
}
     
 }
// bdia lkba hocz jgev
 ;

?>
            <form method="POST" action="register copy.php">
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
              <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Register</button>

              <!-- Register buttons -->
              <div class="text-center">
                <p>Aleardy a member? <a href="login.php">Login</a></p>
                

               
              </div>
            </form>

<?php require "../includes/footer1.php";?>

