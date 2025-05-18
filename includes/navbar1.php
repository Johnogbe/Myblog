<?php session_start()?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title> myblog</title>
        <link rel="icon" type="image/x-icon" href="http://localhost/myblog/assets/favicon.ico"/>
        <!-- Font Awesome icons (free version)-->
        <link rel="stylesheet" href="http://localhost/myblog/fontawesome-free-5.15.2-web/css/all.min.css">
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="http://localhost/myblog/css/styles.css" rel="stylesheet" />
        <script src=""></script> 
 <script>window.onload = function(){
//         var password = document.getElementsByClassName('fas')[0]
//   console.log(password);
//   password.addEventListener("click",function(e){
//     console.log('hi')
//     if(password.classList.contains("fa-eye")){
//     console.log('working');
//   }
  
//   })
var password = document.getElementsByClassName('fas')[1]
console.log(
    password
);
var input = document.getElementsByClassName('in')[0]
password.addEventListener('click',function(){
        console.log('jo');
        if (password.className =='fas fa-eye-slash') {
            password.className = 'fas fa-eye';
            input.type = 'password'

        }else{
            password.className = 'fas fa-eye-slash'
            input.type = 'text'
        }
    })
    }
</script>
   </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="http://localhost/myblog/index.php">welcome </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto py-4 py-lg-0">
                    <div class="ml-4 input-group ps-5">
          <div id="navbar-search-autocomplete" class="w-100 mr-4">
              <form method="POST" action="http://localhost/myblog/search.php" class="mr-4">
                  <input name="search" type="search" id="form1" class="form-control mt-3" placeholder="search" />
             
              </form>

          </div>
         
</div>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="http://localhost/myblog/index.php">Home</a></li><?php if(isset($_SESSION['username'])){?>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="http://localhost/myblog/post/create.php">create</a></li> 
                                <li class="nav-item dropdown mt-3">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $_SESSION['username'] ?></a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown01">
                        <li><a class="dropdown-item" href="http://localhost/myblog/users/profile.php?prof_id=<?php echo $_SESSION['user_id']?>">Profile</a></li>
                        <li><a class="dropdown-item" href="http://localhost/myblog/auth/logout.php">Logout</a></li>
                        </ul></li><?php }else{?><li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="http://localhost/myblog/auth/login.php">login</a></li><li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="http://localhost/myblog/auth/register.php">register</a></li><?php };?><li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="http://localhost/myblog/contact.php">contact</a></li>
                </div>
            </div>
</nav>     