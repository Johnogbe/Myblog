
<?php require_once "../layouts/header.php"?>
<?php require_once "../../config/config.php"?>
<?php 
if (!isset($_SESSION['adminname'])) {
  header('location:http://localhost/myblog/admin-panel/admins/login-admins.php');

}
$categories = $conn->query('select * from category');
$categories->execute();
$result = $categories->fetchAll(PDO::FETCH_OBJ)
?>
          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Categories</h5>
             <a  href="create-category.php" class="btn btn-primary mb-4 text-center float-end">Create Categories</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($result as $row){?>
                  <tr>
                    <th scope="row"><?php echo $row->id?></th>
                    <td><?php echo $row->name?></td>
                    <td><a  href="http://localhost/myblog/admin-panel/categories-admins/update-category.php?up_id=<?php echo $row->id ?>" class="btn btn-warning text-white text-center ">Update </a></td>
                    <td><a href="http://localhost/myblog/admin-panel/categories-admins/delete-category.php?de_id=<?php echo $row->id ?>" class="btn btn-danger  text-center ">Delete </a></td>
                  </tr>
                <?php }?>
                
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>


      <?php require_once "../layouts/footer.php"?>