<?php require_once '../includes/navbar.php'?>
<?php require_once '../config/config.php'?>
<?php 
    if (isset($_GET['post_id'])) {
        $id = $_GET['post_id'];
        $select = "select * from post where id = $id";
        $stmt = $conn->prepare($select);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        if ($stmt->rowCount() == 0) {
            header('location:http://localhost/myblog/404.php');
        }
        $select_comment = $conn->query("select * from comment where id_comment = $id and comment.comment_status = 1");
        $select_comment->execute();
        $allcomments = $select_comment->fetchAll(PDO::FETCH_OBJ);

       
        if (isset($_GET['post_id']) && isset($_POST['submit'])) {
            if ( $_POST['comment']=='') {
            echo "<script>alert('Write a comment')</script>";
            }else{
                $id = $_GET['post_id'];
                $username = $_SESSION['username'];
                $comment = $_POST['comment'];
                $insert= $conn->prepare('insert into comment (id_comment, comment_username,comment) values(:comment_id,:comment_username,:comment);');
                $insert->execute([
                    ':comment_id' => $id,
                    ':comment_username' => $username,
                    ':comment' =>$comment
    
                ]);
                echo "<script>alert('Comment added and it will be forwarded to the admin')
                window.reload()</script>";

                // header("location: post.php?post_id=$id");
            }
           

        }
    
    }else{
        header('location:http://localhost/myblog/404.php');
        
    }
?>
        <!-- Navigation-->
        
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('../images/<?php echo $result->img?>')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="post-heading">
                            <h1><?php echo $result->title?></h1>
                            <h2 class="subheading"><?php echo $result->subtitle?></h2>
                            <span class="meta">
                                Posted by
                                <a href="#!"><?php echo $result->username?></a>
                                <?php echo date('M',strtotime( $result->create_at)).','. date('d',strtotime( $result->create_at)).','. date('Y',strtotime( $result->create_at))?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Post Content-->
        <article class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <p><?php echo $result->body?>
                        <br><?php if (isset($_SESSION['username'])) {
                            if ($_SESSION['username'] == $result->username) {
                        
                        
                            
                        ?>
                       <a href="http://localhost/myblog/post/delete.php?del=<?php echo $result->id?>" class="btn btn-danger text-center float-end text-decoration-none" id='del'>Delete</a>
                       <a href="http://localhost/myblog/post/update.php?update_id=<?php echo $result->id?>" class="btn btn-warning text-center text-decoration-none">Update</a>
                    </div>
                        <?php } }?>
                </div>
            </div>
        </article>
        
      <section>
                <div class="container my-5 py-5">
                  <div class="row d-flex justify-content-center">
                    <div class="col-md-12 col-lg-10 col-xl-8">
                      
                      <h3 class="mb-5">Comments</h3>
                        <?php if(count($allcomments/*  you can use rowcount */) > 0){

                        ?>
                        <?php  foreach ($allcomments as $comment) {?>
                            
                        
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex flex-start align-items-center">
                          
                              <div>
                                  <h6 class="fw-bold text-primary"> <?php echo $comment->comment_username?><h8 class="p-3 text-black"> <?php echo date('M',strtotime( $comment->created_at)).','. date('d',strtotime( $comment->created_at)).','. date('Y',strtotime( $comment->created_at))?></h8></h6>
                                  
                              </div>
                              </div>
      
                              <p class="mt-3 mb-4 pb-2">
                              <?php 
                              echo $comment->comment?>
                              </p>
                         
      
                              <hr class="my-4" />
                              
                       
                        </div><?php }?>
                        <?php }else{?>
                            
                        <div class='text-center'>No comment, be the first to comment!</div>
                        <?php }?>
                        <?php if (isset($_SESSION['username'])) {
                        
                        ?>
                        <form method="POST" action="post.php?post_id=<?php echo $id?>">
      
                              <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
      
                                  <div class="d-flex flex-start w-100">
                                  
                                      <div class="form-outline w-100">
                                          <textarea class="form-control" id="" placeholder="write message" rows="4"
                                           name="comment"></textarea>
                                      
                                      </div>
                                  </div>
                                  <div class="float-end mt-2 pt-1">
                                      <button type="submit" name="submit" class="btn btn-primary btn-sm mb-3">Post comment</button>
                                  </div>
                              </div>
                          </form>
                          <?php
                            } else {
                                echo "<div class='alert alert-danger bg-dark text-white'>please <span ><a class='text-white text-decoration-underline' href='http://localhost/myblog/auth/login.php'>login</a></span> to comment</div>";
                            }?>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
           
        <!-- Footer-->
        <script>
var del = document.getElementById('del')
console.log(del);

del.addEventListener('click',function () {
  
  if (confirm('do you want to delete')) {
      del.href='http://localhost/myblog/post/delete.php?del=<?php echo $result->id?>'
  }else{
    del.href='http://localhost/myblog/post/post.php?post_id=<?php echo $id?>'
  }

})
</script>
        <?php require_once '../includes/footer.php'?>