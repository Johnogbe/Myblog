<?php require_once "layouts/header.php"?>
<?php require_once "../config/config.php"?>
<?php if (!isset($_SESSION['adminname'])){
  header('location:http://localhost/myblog/admin-panel/admins/login-admins.php');
}
// post
$select_post = $conn->query('select count(*) as post from post');
$select_post->execute();
$select_post_all = $select_post->fetch(PDO::FETCH_OBJ);

// category
$select_category = $conn->query('select count(*) as category from category');
$select_category->execute();
$select_category_all = $select_category->fetch(PDO::FETCH_OBJ);

// ADMIN
$select_admin = $conn->query('select count(*) as admin from admin');
$select_admin->execute();
$select_admin_all = $select_admin->fetch(PDO::FETCH_OBJ)

?>
      <div class="row">
       
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Posts</h5>
              <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
              <p class="card-text">number of posts: <?php echo $select_post_all->post?></p>
             
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Categories</h5>
              
              <p class="card-text">number of categories: <?php echo $select_category_all->category?></p>
              
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Admins</h5>
              
              <p class="card-text">number of admins: <?php echo $select_admin_all->admin?></p>
              
            </div>
          </div>
        </div>
      </div>
    
<?php require_once "layouts/footer.php"?>
           