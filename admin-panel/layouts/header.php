<?php session_start()?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Admin Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="http://localhost/myblog/bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="http://localhost/myblog/fontawesome-free-5.15.2-web/css/all.min.css">
     

     <link href="http://localhost/myblog/admin-panel/styles/style.css" rel="stylesheet">
    <script src="http://localhost/myblog/jQuery-3.7.1/jquery-3.7.1.js"></script>
    <script src="http://localhost/sweetalert/sweetlalert2.min.js"></script>

    <script src="http://localhost/myblog/bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
<style>

.dropbtn {
  
  color: rgb(182, 175, 175);
  padding-bottom:5px;
  font-size: 17px;
 border:none;
  cursor: pointer;
  

}

.dropdown {
  position: relative;
  display: inline-block;
  margin-top:8px;
  
}

.dropdown-content {
  display: none;
 
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  top:20px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
  display: block;
}

</style>
</head>
<body>
<div id="wrapper">
    <nav class="navbar header-top fixed-top navbar-expand-lg  navbar-dark bg-dark">
      <div class="container">
      <a class="navbar-brand"style="margin-right:1000px" href="#" >LOGO</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
<?php if (isset($_SESSION['adminname'])){

?>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav side-nav" >
          <li class="nav-item">
            <a class="nav-link text-white" style="margin-left: 20px;" href="http://localhost/myblog/admin-panel/index.php">Home
              <span class="sr-only"></span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/myblog/admin-panel/admins/admins.php" style="margin-left: 20px;">Admins</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/myblog/admin-panel/categories-admins/show-categories.php" style="margin-left: 20px;">Categories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/myblog/admin-panel/posts-admins/show-posts.php" style="margin-left: 20px;">Posts</a>
</li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/myblog/admin-panel/comments/comments.php" style="margin-left: 20px;">Comments</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/myblog/admin-panel/uses/users.php" style="margin-left: 20px;">users</a>
          </li>
          <?php }?>
        </ul>
        <ul class="navbar-nav ml-md-auto d-md-flex">
        <?php if (isset($_SESSION['adminname'])){

?>
          <li class="nav-item" style="margin-right:100px">
            <a class="nav-link" href="http://localhost/myblog/admin-panel/index.php">Home
              <span class="sr-only"></span>
            </a>
          </li>
          
          <div class="dropdown">
  <div class="dropbtn" style="float:right"><?php echo $_SESSION['adminname'] ?></div>
  <div class="dropdown-content">
  <a href="http://localhost/myblog/admin-panel/admins/logout.php">logout</a>
        <?php }else{?>

<li class="nav-item">
<a class="nav-link" href="http://localhost/myblog/admin-panel/admins/login-admins.php">login
  <span class="sr-only">
</a>
</li>
<?php } ?>
  </div>
</div>
              
          </li>
                          
          
        </ul>
      </div>
    </div>
    </nav>
    <div class="container">
            