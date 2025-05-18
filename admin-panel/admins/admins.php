
<?php require_once "../layouts/header.php"?>
<?php require_once "../../config/config.php"?>
<?php 
if (!isset($_SESSION['adminname'])) {
  header('location:http://localhost/myblog/admin-panel/admins/login-admins.php');

}
$select = $conn->query('select * from admin');
$select->execute();
$result = $select->fetchAll(PDO::FETCH_OBJ)

?>
          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Admins</h5>
             <a  href="create-admins.php" class="btn btn-primary mb-4 text-center float-end">Create Admins</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">username</th>
                    <th scope="col">email</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php foreach($result as $row){?>
                    <th scope="row"><?php echo  $row->id?></th>
                    <td><?php  echo $row->adminname?></td>
                    <td><?php echo $row->email?></td>
                   
                  </tr>
                    <?php }?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>

      <?php require_once "../layouts/footer.php"?>
