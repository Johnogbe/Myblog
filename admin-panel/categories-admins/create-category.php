
<?php require_once "../layouts/header.php"?>
<?php require_once "../../config/config.php"?>
<?php 
if (!isset($_SESSION['adminname'])) {
  header('location:http://localhost/myblog/admin-panel/admins/login-admins.php');

}
        if (isset($_POST['submit'])){
          $name = $_POST['name'];
          
          if (empty($name)) {
            echo "<div class='alert alert-danger text-center' role='alert'> please type in something</div>";
        
         }else{
           
         $query = "insert into category (name)values(?);";
         $stmt = $conn->prepare($query);
         $stmt->execute([$name]);
         header('location:http://localhost/myblog/admin-panel/categories-admins/show-categories.php');
         };
        }
  ?>  
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Categories</h5>
          <form method="POST" action="create-category.php">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />
                 
                </div>

      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Create</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>
<?php require_once "../layouts/footer.php"?>
 