<?php require_once "../config/config.php"?>
<?php require_once "../includes/header.php"?>
<?php 
if (isset($_GET['cat_id'])) {
    $id = $_GET['cat_id'];
    $query = $conn->query("select * from  post where post.category_id = $id and post.status=1");
    $cat = $conn->query("select name from category where id = $id");
    $cat->execute();
    $query->execute();
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    $name = $cat->fetch(PDO::FETCH_ASSOC);
    if (empty($rows)) {
        echo '<h2>No Blog For Category</h2>'
        . "<a href='http://localhost/myblog/post/create.php'>create blog for $name[name]";
        
    }

}else{
    header('location:http://localhost/myblog/404.php');
}
    

?>

<div class="row gx-4 gx-lg-5 justify-content-center">
                <?php// echo $_SESSION['username']?>
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <!-- Post preview-->
                    <?php foreach ($rows as $row){ ?>


                    <div class="post-preview">
                        <a href="http://localhost/myblog/post/post.php?post_id=<?php echo $row['id']?>">
                            <h2 class="post-title"><?php echo $row['title']?></h2>
                            <h3 class="post-subtitle"><?php echo $row['subtitle']?></h3>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="#!"><?php echo $row['username']?></a>
                            <?php echo date('M',strtotime( $row['create_at'])).','. date('d',strtotime( $row['create_at'])).','. date('Y',strtotime( $row['create_at']))?>
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                    <?php };?>
                    <!-- Pager-->
           
                </div>
                
                
  
                        
<?php require_once "../includes/footer.php"?>