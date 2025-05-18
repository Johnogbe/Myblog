<?php session_start();
        require_once '../config/config.php';
if(isset($_POST['forgot'])){
    $email = $_POST['forgot'];
    
    echo 'forget email gotten';
  }

if (isset($_POST['register'])){
  $username = $_POST['username'];
  $email = $_POST['email'];
  $pass = $_POST['password'];
  if (empty($username)||empty($email)||empty($pass)) {
    echo "<div class='alert alert-danger text-center' role='alert'> please type in something</div>";

 }else{
  
   $password = password_hash($pass,PASSWORD_DEFAULT);
 $query = "insert into users (email,username,mypassword)values(?,?,?);";
 $stmt = $conn->prepare($query);
 $stmt->execute([$email,$username,$password]);

    
    $message = $username . ',You just created an account with us🎉🎉';
    $subject = 'Account creation';
    $header = "From: $email";
    $to = $email;
$mail = new PHPMailer(true);

try {
    // SMTP Settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com'; // Replace with your SMTP host
    $mail->SMTPAuth   = true;
    $mail->Username   = 'johnogbe220@gmail.com'; // Your email
    $mail->Password   = 'vvyk txkz asfp hjoe'; // Your email password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    // Email Settings
    $mail->setFrom($email, $name);
    $mail->addAddress('johnogbe214@gmail.com', 'Admin'); // Replace with recipient email

    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = "<p><strong>Name:</strong> $username</p>
                      <p><strong>Email:</strong> $email</p>
                      <p><strong>Message:</strong><br>$message</p>";
    $mail->AltBody = "Name: $name\nEmail: $email\nMessage: $message";

    // Send Email
    $mail->send();
    echo "Message sent successfully!";
} catch (Exception $e) {
    echo "Message could not be sent. Error: {$mail->ErrorInfo}";
}

   
 }
// bdia lkba hocz jgev
 //header('location:login.php');
 };


  if(isset($_POST['submit'])){
    $email =trim($_POST['email']);
    $password =trim($_POST['password']);

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
          //header('location:../index.php');
          echo 'login successful';
          
        }else{
          echo "<div class='alert alert-danger text-center' role='alert'> your password is not correct </div>";

        } 
        
      }else{
        echo "<div class='alert alert-danger text-center' role='alert'>Account not available!. Check email spelling or register an account</div>";

      }
    };
}?>