

<?php require_once "../layouts/header.php"?>
<?php require_once "../../config/config.php"?>
<?php 
if (!isset($_SESSION['adminname'])) {
  header('location:http://localhost/myblog/admin-panel/admins/login-admins.php');

}
$comment = $conn->query("SELECT post.id as id,post.title as title,comment.id_comment as post_id, comment.id as commentid, comment_username as comment_username,comment.comment_status as status,comment.comment as comment FROM comment join post on post.id = comment.id_comment;");
$comment->execute();
$result = $comment->fetchAll(PDO::FETCH_OBJ);

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
                    <th scope="col">comment</th>
                    <th scope="col">user</th>
                    <th scope="col">status</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($result as $row){?>
                  <tr>
                    <th scope="row"><?php echo $row->commentid?> </th>
                    <td><?php echo $row->title?></td>
                    <td><?php echo $row->comment?></td>
                    <td><?php echo $row->comment_username?></td>
                    <?php if ($row->status == 0) {?>
                      <td><a href="http://localhost/myblog/admin-panel/comments/comment_status.php?status=<?php echo $row->status ?>&id=<?php echo $row->commentid ?>" class="btn btn-danger  text-center ">deactivated</a></td>  
                    <?php }else{  ?>
                      <td><a href="http://localhost/myblog/admin-panel/comments/comment_status.php?status=<?php echo $row->status ?>&id=<?php echo $row->commentid ?>" class="btn btn-primary  text-center ">activated</a></td>
                    <?php }?>  
                     <td><a href="" class="btn btn-danger  text-center del" >delete</a></td>
                  </tr>
                  <?php }?>
                 
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>

<script>
var dels = document.getElementsByClassName('del')
for(del of dels){
  console.log(del);
del.addEventListener('click',function (params) {
//   Swal.fire({
//   title: "The Internet?",
//   text: "That thing is still around?",
//   icon: "question"
// });
  if (confirm('do you want to delete')) {
      del.href='http://localhost/myblog/admin-panel/comments/delete_comment.php?id=<?php echo $row->commentid ?>'
  }else{
    del.href='http://localhost/myblog/admin-panel/comments/comments.php'
  }

})}
</script>
      <?php require_once "../layouts/footer.php"?>
