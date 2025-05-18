

<?php require_once "../layouts/header.php"?>
<?php require_once "../../config/config.php"?>
<?php 
if (!isset($_SESSION['adminname'])) {
  header('location:http://localhost/myblog/admin-panel/admins/login-admins.php');

}
$select = $conn->query("SELECT post.id as id,post.username as user,category.name as cat_name,post.title as title,post.status as status FROM category join post on post.category_id = category.id;");
$select->execute();
$result = $select->fetchAll(PDO::FETCH_OBJ);

?>
          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Posts</h5>
            
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">title</th>
                    <th scope="col">category</th>
                    <th scope="col">user</th>
                    <th scope="col">status</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($result as $row){?>
                  <tr>
                    <th scope="row"><?php echo $row->id?> </th>
                    <td><?php echo $row->title?></td>
                    <td><?php echo $row->cat_name?></td>
                    <td><?php echo $row->user?></td>
                    <?php if ($row->status == 0) {?>
                      <td><a href="status-posts.php?status=<?php echo $row->status ?>&id=<?php echo $row->id ?>" class="btn btn-danger  text-center ">deactivated</a></td>  
                    <?php }else{  ?>
                      <td><a href="status-posts.php?status=<?php echo $row->status ?>&id=<?php echo $row->id ?>" class="btn btn-primary  text-center ">activated</a></td>
                    <?php }?>  
                     <td><a href="http://localhost/myblog/admin-panel/posts-admins/delete-posts.php?po_id=<?php echo $row->id?>"class="btn btn-danger text-center del">delete</a></td>
                  </tr>
                  <?php }?>
                 
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>
      <script src="http://localhost/myblog/bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
<script>

var dels = document.getElementsByClassName('del')
console.log(dels);

console.log(del);
var del;
for(del of dels){
del.addEventListener('click',function(e){
  console.log(e);
  console.log(e.target.href);
  if (confirm('do you want to delete')) {
      var href = e.target.href;
      e.target.href=href;
  }else{
    e.target.href='http://localhost/myblog/admin-panel/posts-admins/show-posts.php'
  }

})}
</script>

      <?php require_once "../layouts/footer.php"?>
